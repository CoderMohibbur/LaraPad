<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostRevision;
use Illuminate\Http\Request;

class PostRevisionController extends Controller
{
    // Show all revisions for a post
    public function index(Post $post)
    {
        $revisions = $post->revisions()->with('editor')->latest()->paginate(10);
        return view('admin.posts.revisions.index', compact('post', 'revisions'));
    }

    // Show single revision (for preview or comparison)
    public function show(Post $post, PostRevision $revision)
    {
        abort_unless($revision->post_id === $post->id, 403);

        return view('admin.posts.revisions.show', compact('post', 'revision'));
    }

    // Restore selected revision as current version
    public function restore(Post $post, PostRevision $revision)
    {
        abort_unless($revision->post_id === $post->id, 403);

        // Save current state as a revision
        PostRevision::create([
            'post_id' => $post->id,
            'edited_by' => auth()->id(),
            'title' => $post->title,
            'short_description' => $post->short_description,
            'description' => $post->description,
            'meta' => $post->meta,
        ]);

        // Restore fields from selected revision
        $post->update([
            'title' => $revision->title,
            'short_description' => $revision->short_description,
            'description' => $revision->description,
            'meta' => $revision->meta,
        ]);

        return redirect()->route('posts.edit', $post)->with('success', 'Revision restored successfully.');
    }
}
