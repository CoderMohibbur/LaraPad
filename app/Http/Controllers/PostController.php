<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    // 🟢 Show all posts
    public function index()
    {
        $posts = Post::with(['categories', 'tags'])->latest()->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    // 🟢 Show create form
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    // 🟢 Show edit form
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    // ✅ Store new post
    public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'nullable|unique:posts,slug',
        'excerpt' => 'nullable|string',
        'content' => 'nullable|string',
        'featured_image' => 'nullable|file|image|mimes:jpg,jpeg,png,webp|max:2048',
        'status' => 'required|in:draft,published',
        'meta_title' => 'nullable|string',
        'meta_description' => 'nullable|string',
        'categories' => 'nullable|array',
        'tags' => 'nullable|array',
    ]);

    // Slug auto-generate
    $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
    $data['user_id'] = 1;

    // ✅ Upload image if exists
    if ($request->hasFile('featured_image')) {
        $data['featured_image'] = $request->file('featured_image')->store('posts', 'public');
    }

    // Meta
    $data['meta'] = [
        'title' => $data['meta_title'] ?? null,
        'description' => $data['meta_description'] ?? null,
    ];
    unset($data['meta_title'], $data['meta_description']);

    // Save post
    $post = Post::create($data);

    // Categories & Tags
    $post->categories()->sync($request->input('categories', []));
    $post->tags()->sync($request->input('tags', []));

    return redirect()->route('posts.index')->with('success', 'Post created successfully!');
}
    // ✅ Update post
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|unique:posts,slug,' . $post->id,
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'featured_image' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'categories' => 'nullable|array',
            'tags' => 'nullable|array',
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);

        $data['meta'] = [
            'title' => $data['meta_title'] ?? null,
            'description' => $data['meta_description'] ?? null,
        ];
        unset($data['meta_title'], $data['meta_description']);

        $post->update($data);

        $post->categories()->sync($request->input('categories', []));
        $post->tags()->sync($request->input('tags', []));

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    // ✅ Delete post
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post deleted successfully!');
    }

    // ✅ Show details
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }
}
