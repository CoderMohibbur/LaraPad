<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::latest()->paginate(10);
        return view('admin.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags,name',
            'slug' => 'required|unique:tags,slug',
        ]);

        Tag::create($request->only('name', 'slug'));

        return redirect()->route('tags.index')->with('success', 'Tag created.');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags,name,' . $tag->id,
            'slug' => 'required|unique:tags,slug,' . $tag->id,
        ]);

        $tag->update($request->only('name', 'slug'));

        return redirect()->route('tags.index')->with('success', 'Tag updated.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back()->with('success', 'Tag deleted.');
    }
}


