<?php

namespace App\Http\Controllers\Admin;

use id;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Post::where('post_type', 'page')->latest()->paginate(10);
        return view('admin.page.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'content' => 'nullable',
            'status' => 'required',
        ]);

        $data['post_type'] = 'page'; // ✅ এখানেই পার্থক্য
        $data['user_id'] = 1;

        Post::create($data);

        return redirect()->route('pages.index')->with('success', 'Page created!');
    }

public function edit(Page $page)
{
    return view('admin.page.edit', compact('page'));
}

public function update(Request $request, Page $page)
{
    $data = $request->validate([
        'title' => 'required',
        'slug' => 'required|unique:pages,slug,' . $page->id,
        'content' => 'nullable',
        'status' => 'required',
        'meta_title' => 'nullable',
        'meta_description' => 'nullable',
    ]);

    $data['meta'] = [
        'title' => $data['meta_title'],
        'description' => $data['meta_description'],
    ];

    unset($data['meta_title'], $data['meta_description']);

    $page->update($data);

    return redirect()->route('pages.index')->with('success', 'Page updated.');
}

public function destroy(Page $page)
{
    $page->delete();
    return back()->with('success', 'Page deleted.');
}

}
