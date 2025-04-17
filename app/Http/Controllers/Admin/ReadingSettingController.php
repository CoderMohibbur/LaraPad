<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReadingSetting;
use Illuminate\Http\Request;

class ReadingSettingController extends Controller
{
    public function index()
    {
        $setting = ReadingSetting::first();
        return view('admin.reading-settings.index', compact('setting'));
    }

    public function edit()
    {
        $setting = ReadingSetting::first();
        return view('admin.reading-settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'homepage_display' => 'required|in:latest_posts,static_page',
            'homepage_id' => 'nullable|integer',
            'posts_page_id' => 'nullable|integer',
            'blog_page_limit' => 'required|integer|min:1',
            'feed_limit' => 'required|integer|min:1',
            'post_feed_type' => 'required|in:full_text,excerpt',
            'search_engine_visibility' => 'nullable|boolean',
        ]);

        $setting = ReadingSetting::firstOrNew([]);
        $setting->fill($request->all());
        $setting->search_engine_visibility = $request->has('search_engine_visibility');
        $setting->save();

        return redirect()->route('admin.reading-settings.index')->with('success', 'Reading Settings updated successfully!');
    }
}
