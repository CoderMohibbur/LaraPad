<?php

namespace App\Http\Controllers;

use id;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('categories', 'tags')->latest()->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }




    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'excerpt' => 'nullable',
            'content' => 'nullable',
            'featured_image' => 'nullable',
            'status' => 'required',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'categories' => 'nullable|array',
            'tags' => 'nullable|array',
        ]);

        $data['user_id'] = 1;
        $data['meta'] = [
            'title' => $data['meta_title'] ?? null,
            'description' => $data['meta_description'] ?? null,
        ];

        unset($data['meta_title'], $data['meta_description']);

        $post = Post::create($data);
        $post->categories()->sync($request->categories ?? []);
        $post->tags()->sync($request->tags ?? []);

        return redirect()->route('posts.index')->with('success', 'Post created!');
    }



    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'excerpt' => 'nullable',
            'content' => 'nullable',
            'featured_image' => 'nullable',
            'status' => 'required',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'categories' => 'nullable|array',
            'tags' => 'nullable|array',
        ]);

        $data['meta'] = [
            'title' => $data['meta_title'] ?? null,
            'description' => $data['meta_description'] ?? null,
        ];

        unset($data['meta_title'], $data['meta_description']);

        $post->update($data);
        $post->categories()->sync($request->categories ?? []);
        $post->tags()->sync($request->tags ?? []);

        return redirect()->route('posts.index')->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post deleted!');
    }
    public function show(Post $post)
{
    return view('admin.post.show', compact('post'));
}

}
