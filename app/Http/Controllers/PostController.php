<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Models\PostRevision;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['categories', 'tags', 'author'])->latest()->paginate(10);
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
            'slug' => 'nullable|string|unique:posts,slug',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
        ]);

        $post = new Post();
        $post->title = $validated['title'];
        $post->slug = $validated['slug'] ?? Str::slug($validated['title']) . '-' . uniqid();
        $post->author_id = auth()->id();
        $post->short_description = $validated['short_description'] ?? null;
        $post->description = $validated['description'] ?? null;

        if ($request->hasFile('image')) {
            $post->image_url = $request->file('image')->store('uploads/posts', 'public');
        }

        $post->meta = [
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'meta_keywords' => $validated['meta_keywords'] ?? null,
        ];

        $post->category_id = $validated['category_id']; // ✅ এটা অবশ্যই থাকতে হবে
        $post->published_at = $validated['published_at'] ?? null;

        $post->save();

        // Attach tags
        $post->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }


    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post->load(['tags', 'categories']),
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:posts,slug,' . $post->id,
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
        ]);

        // Save revision
        PostRevision::create([
            'post_id' => $post->id,
            'edited_by' => auth()->id(),
            'title' => $post->title,
            'short_description' => $post->short_description,
            'description' => $post->description,
            'meta' => $post->meta,
        ]);

        $post->title = $validated['title'];
        $post->slug = $validated['slug'] ?? $post->slug;
        $post->short_description = $validated['short_description'] ?? null;
        $post->description = $validated['description'] ?? null;

        if ($request->hasFile('image')) {
            $post->image_url = $request->file('image')->store('uploads/posts', 'public');
        }

        $post->meta = [
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'meta_keywords' => $validated['meta_keywords'] ?? null,
        ];

        $post->published_at = $validated['published_at'] ?? null;
        $post->save();

        $post->category_id = $validated['category_id'];
        $post->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted.');
    }
}
