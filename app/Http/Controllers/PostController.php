<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        // Category is many-to-many, so 'categories'
        $posts = Post::with(['categories', 'author'])->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $slug = Str::slug($request->title) . '-' . uniqid();
        $uploadedImagePath = null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/posts', 'public');
            $uploadedImagePath = '/storage/' . $path;
        }

        $post = Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image_url' => $uploadedImagePath,
            'author_id' => auth()->id(),
            'published_at' => now(),
        ]);

        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        if ($request->has('categories')) {
            $post->categories()->attach($request->categories);
        }

        return redirect()->route('blog.posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/posts', 'public');
            $validated['image_url'] = '/storage/' . $path;
        }

        $post->update([
            'title' => $validated['title'],
            'short_description' => $validated['short_description'],
            'description' => $validated['description'],
            'image_url' => $validated['image_url'] ?? $post->image_url,
        ]);

        $post->tags()->sync($request->tags ?? []);
        $post->categories()->sync($request->categories ?? []);

        return redirect()->route('blog.posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post deleted successfully.');
    }

    public function frontendIndex()
    {
        $posts = Post::with(['categories', 'author'])->latest()->paginate(6);
        $topics = Category::latest()->get();
        return view('pages.blog', compact('posts', 'topics'));
    }

    public function show($slug)
    {
        $post = Post::with(['categories', 'author', 'tags'])->where('slug', $slug)->firstOrFail();
        return view('pages.blog-details', compact('post'));
    }
}
