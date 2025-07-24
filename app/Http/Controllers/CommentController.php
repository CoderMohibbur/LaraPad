<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // ✅ Frontend comment submission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'comment' => 'required|string|max:2000',
        ]);

        Comment::create([
            'post_id' => $validated['post_id'],
            'user_id' => auth()->id(), // if user logged in, or null for guest
            'comment' => $validated['comment'],
            'approved' => false, // Default false
        ]);

        return back()->with('success', 'Your comment has been submitted for review.');
    }

    // ✅ Admin: list all comments (optional filter: unapproved)
    public function index(Request $request)
    {
        $query = Comment::with('post', 'user')->latest();

        if ($request->has('filter') && $request->filter === 'pending') {
            $query->where('approved', false);
        }

        $comments = $query->paginate(20);

        return view('admin.comments.index', compact('comments'));
    }

    // ✅ Admin: approve a comment
    public function approve(Comment $comment)
    {
        $comment->update(['approved' => true]);

        return back()->with('success', 'Comment approved.');
    }

    // ✅ Admin: soft delete
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('success', 'Comment deleted.');
    }
}
