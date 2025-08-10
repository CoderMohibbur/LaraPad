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

        // 1) DB-তে লোগো সেট না থাকলে সোজা fallback
        if (!$setting || !$setting->logo) {
            return asset('/uploads/2025/04/khalidit-logo-removebg-preview.png');
        }

        // 2) normalize: আগে যদি 'public/...' সেভ করা থাকে, সেটা সরিয়ে নিই
        $path = ltrim($setting->logo, '/');
        $path = preg_replace('#^public/#', '', $path); // "public/uploads/logo/..." -> "uploads/logo/..."

        // 3) storage disk (public) এ ফাইল আছে?
        if (\Illuminate\Support\Facades\Storage::disk('public')->exists($path)) {
            // URL: /storage/uploads/logo/...
            return asset('storage/' . $path);
        }

        // 4) নাহলে public root-এ আছে কিনা দেখো (কেউ যদি সরাসরি public/uploads/... এ কপি করে থাকে)
        if (file_exists(public_path($path))) {
            // URL: /uploads/logo/...
            return asset($path);
        }

        // 5) কিছুই না পেলে fallback
        return asset('/uploads/2025/04/khalidit-logo-removebg-preview.png');
    }


    /**
     * ✅ Header-এ দেখানোর জন্য লোগোর ফাইনাল URL
     * - DB-তে না থাকলে fallback
     * - absolute URL হলে 그대로 রিটার্ন
     * - storage/public এ থাকলে `/storage/...` URL
     * - public root-এ থাকলে `/uploads/...` URL
     */
    public static function headerLogoUrl(): string
    {
        $fallback = asset('/uploads/2025/04/khalidit-logo-removebg-preview.png');

        $setting = ReadingSetting::query()->select('logo')->first();
        if (!$setting || !$setting->logo) {
            return $fallback;
        }

        $logo = trim($setting->logo);

        // 1) External absolute URL?
        if (preg_match('#^https?://#i', $logo)) {
            return $logo;
        }

        // 2) Normalize path (যদি 'public/...' সেভ করা থাকে)
        $path = ltrim($logo, '/');
        $path = preg_replace('#^public/#', '', $path); // public/uploads/... -> uploads/...

        // 3) Storage disk (public) এ ফাইল আছে?
        if (Storage::disk('public')->exists($path)) {
            return asset('storage/' . $path); // /storage/uploads/...
        }

        // 4) public root-এ ফাইল আছে?
        if (file_exists(public_path($path))) {
            return asset($path); // /uploads/...
        }

        // 5) কিছুই না পেলে fallback
        return $fallback;
    }

    public function destroyLogo()
{
    $setting = ReadingSetting::first();

    if (!$setting || !$setting->logo) {
        return back()->with('error', 'No logo found to delete.');
    }

    // Normalize path
    $path = ltrim($setting->logo, '/');
    $path = preg_replace('#^public/#', '', $path);

    // Delete from storage if exists
    if (Storage::disk('public')->exists($path)) {
        Storage::disk('public')->delete($path);
    } elseif (file_exists(public_path($path))) {
        @unlink(public_path($path));
    }

    // Remove from DB
    $setting->logo = null;
    $setting->save();

    return back()->with('success', 'Logo deleted successfully!');
}

    
}
