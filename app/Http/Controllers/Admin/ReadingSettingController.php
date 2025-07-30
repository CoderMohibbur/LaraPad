<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReadingSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReadingSettingController extends Controller
{
    /**
     * ✅ Reading Settings index view
     */
    public function index()
    {
        $setting = ReadingSetting::first();
        return view('admin.reading-settings.index', compact('setting'));
    }

    /**
     * ✅ Edit Reading Settings view
     */
    public function edit()
    {
        $setting = ReadingSetting::first();
        return view('admin.reading-settings.edit', compact('setting'));
    }

    /**
     * ✅ Update Reading Settings (সব সেটিংস)
     */
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

        return redirect()
            ->route('admin.reading-settings.index')
            ->with('success', 'Reading Settings updated successfully!');
    }

    /**
     * ✅ শুধু লোগো আপলোড view দেখানোর জন্য
     */
    public function logo()
    {
        $setting = ReadingSetting::first();
        return view('admin.reading-settings.logo', compact('setting'));
    }

    /**
     * ✅ শুধু লোগো আপডেট করার মেথড
     */
    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $setting = ReadingSetting::firstOrNew([]);

        // পুরনো লোগো থাকলে ডিলিট
        if ($setting->logo && Storage::disk('public')->exists($setting->logo)) {
            Storage::disk('public')->delete($setting->logo);
        }

        // নতুন লোগো আপলোড
        $path = $request->file('logo')->store('uploads/logo', 'public');
        $setting->logo = $path;
        $setting->save();

        return back()->with('success', 'Logo updated successfully!');
    }

    /**
     * ✅ ন্যাভ মেনুর জন্য লোগো রিটার্ন
     */
    public static function getLogo()
    {
        $setting = ReadingSetting::first();
        return $setting && $setting->logo
            ? asset('storage/' . $setting->logo)
            : asset('uploads/default-logo.png'); // fallback লোগো
    }
}
