<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
    /**
     * Show blog listing page.
     */
    public function index(Request $request)
    {
        $query = Post::with(['category', 'author', 'tags'])
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at');

        // 🔍 Search functionality
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $allPosts = $query->get();

        $featured = $allPosts->first(); // 🏅 First post as featured
        $posts = $allPosts->skip(1)->take(6); // 📄 Remaining posts
        $topics = Category::all(); // 📂 All categories for filtering or sidebar

        return view('pages.blog', compact('featured', 'posts', 'topics'));
    }

    /**
     * Show single blog post page.
     */

public function show($slug)
{
    $post = Post::with(['category', 'tags', 'author'])
        ->where('slug', $slug)
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->firstOrFail();

    // 🔁 Related posts from same category (excluding current post)
    $relatedPosts = Post::with('author')
        ->where('id', '!=', $post->id)
        ->where('category_id', $post->category_id)
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->latest('published_at')
        ->take(4)
        ->get();

    // 📚 Topics (Categories)
    $topics = Category::orderBy('name')->get();

    return view('pages.blog-details', compact('post', 'relatedPosts', 'topics'));
}


public function category($slug)
{
    $category = Category::where('slug', $slug)->firstOrFail();

    $posts = Post::with(['category', 'author', 'tags'])
        ->where('category_id', $category->id)
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->latest()
        ->paginate(10);

    return view('admin.posts.blog-category', compact('category', 'posts'));
}


}
