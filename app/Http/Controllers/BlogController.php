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
    $query = Post::with(['category', 'author'])->where('status', 'published');

    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    $allPosts = $query->latest()->get();

    $featured = $allPosts->first();
    $posts = $allPosts->skip(1)->take(6);
    $topics = Category::all();

    return view('pages.blog', compact('featured', 'posts', 'topics'));
}
// hyu 8 yt g ygg gytc
    public function show($slug)
{
    $post = Post::where('slug', $slug)->where('status', 'published')->firstOrFail();

    return view('pages.blog.show', compact('post'));
}
}

