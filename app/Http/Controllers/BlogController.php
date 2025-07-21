<?php

// app/Http/Controllers/BlogController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with(['category', 'author', 'tags'])
            ->where('published_at', '<=', now())
            ->latest();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $allPosts = $query->get();

        $featured = $allPosts->first();
        $posts = $allPosts->skip(1)->take(6);
        $topics = Category::all();

        return view('pages.blog', compact('featured', 'posts', 'topics'));
    }

    public function show($slug)
    {
        $post = Post::with(['category', 'tags', 'author'])
            ->where('slug', $slug)
            ->where('published_at', '<=', now())
            ->firstOrFail();

        return view('pages.blog.show', compact('post'));
    }
}
