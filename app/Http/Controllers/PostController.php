<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'author'])->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'category_id'       => 'nullable|exists:categories,id',
            'short_description' => 'nullable|string',
            'description'       => 'nullable|string',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // 🔥 Auto-generate unique slug
        $slug = Str::slug($validated['title']);
        $original = $slug;
        $count = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $count++;
        }

        // ✅ Upload image if present
        $imageUrl = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/posts', 'public');
            $imageUrl = Storage::url($path);
        }

        // ✅ Create post and mark as published
        Post::create([
            'title'             => $validated['title'],
            'slug'              => $slug,
            'category_id'       => $validated['category_id'] ?? null,
            'author_id'         => auth()->id(),
            'short_description' => $validated['short_description'],
            'description'       => $validated['description'],
            'image_url'         => $imageUrl,
            'published_at'      => now(),
        ]);

        return redirect()->route('blog.posts.index')->with('success', 'Post created and published successfully.');
    }

    public function frontendIndex()
{
    $posts = Post::with('category', 'author')->latest()->paginate(6);
    $topics = Category::latest()->get(); // Sidebar এর জন্য
    return view('pages.blog', compact('posts', 'topics'));
}


    public function show($slug)
    {
        $post = Post::with(['category', 'author'])->where('slug', $slug)->firstOrFail();
        return view('pages.blog-details', compact('post'));
    }


    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'category_id'       => 'nullable|exists:categories,id',
            'short_description' => 'nullable|string',
            'description'       => 'nullable|string',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // 🔄 Update slug if title changed
        $slug = $post->slug;
        if ($post->title !== $validated['title']) {
            $slug = Str::slug($validated['title']);
            $original = $slug;
            $count = 1;
            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $original . '-' . $count++;
            }
        }

        // ✅ Handle image update
        $imageUrl = $post->image_url;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/posts', 'public');
            $imageUrl = Storage::url($path);
        }

        $post->update([
            'title'             => $validated['title'],
            'slug'              => $slug,
            'category_id'       => $validated['category_id'] ?? null,
            'short_description' => $validated['short_description'],
            'description'       => $validated['description'],
            'image_url'         => $imageUrl,
        ]);

        return redirect()->route('blog.posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post deleted successfully.');
    }
}
