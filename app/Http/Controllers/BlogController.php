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
            ->where('published_at', '<=', now());

        // 🔍 Optional: Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // 🔍 Optional: Search by title
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // ✅ Get all filtered or non-filtered posts
        $posts = $query->latest('published_at')->paginate(12); // pagination added

        // 📂 Topics / Categories
        $topics = Category::orderBy('name')->get();

        return view('pages.blog', compact('posts', 'topics'));
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

        // 💬 Approved Comments
        $comments = $post->comments()->with('user')->latest()->get();

        return view('pages.blog-details', compact('post', 'relatedPosts', 'topics', 'comments'));
    }
public function home()
{
    $latestPosts = Post::with(['author', 'tags'])
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->latest('published_at')
        ->take(3)
        ->get();

    if ($latestPosts->isEmpty()) {
        $latestPosts = collect([
            [
                'title' => 'Cold Email Deliverability in 2025: DMARC, SPF, DKIM & The Inboxing Checklist',
                'slug'  => 'cold-email-deliverability-2025',
                'excerpt' => 'Stop landing in Promotions. Sender reputation, sub-domain strategy...',
                'author'  => 'Ayesha Rahman',
                'avatar'  => 'https://i.pravatar.cc/80?img=21',
                'cover'   => 'https://images.pexels.com/photos/1181343/pexels-photo-1181343.jpeg',
                'read'    => 7,
                'date'    => '2025-08-10',
                'tags'    => ['Deliverability','DMARC','Warm-up'],
            ],
        ]);
    }

    // এখানে তোমার হোম পেজের আসল blade দিন (যেটাতে includes আছে)
    return view('home', ['latestPosts' => $latestPosts]);
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
