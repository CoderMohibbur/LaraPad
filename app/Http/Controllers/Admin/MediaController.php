<?php

namespace App\Http\Controllers\Admin;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Services\ImageService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class MediaController extends Controller
{


    public function index(Request $request)
    {
        $query = Media::query();
    
        // Filter: type
        if ($request->filled('type')) {
            $query->where('mime_type', 'like', $request->type . '%');
        }
    
        // Filter: month
        if ($request->filled('month')) {
            $query->where('folder', $request->month);
        }
    
        // Search
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('original_name', 'like', "%{$request->search}%")
                  ->orWhere('title', 'like', "%{$request->search}%");
            });
        }
    
        $media = $query->orderByRaw('position IS NULL, position ASC, created_at DESC')->paginate(24);



        
        // Unique months for filter dropdown
        $months = Media::select('folder')
            ->distinct()
            ->orderBy('folder', 'desc')
            ->pluck('folder');
    
        return view('admin.media.index', compact('media', 'months'));
    }
    

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,webp,avif,pdf,mp4|max:10240'
        ]);
    
        $file = $request->file('file');
    
        $media = app(ImageService::class)->handleUpload($file);
    
        // ✅ Auto title & alt text
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $media->update([
            'title' => $media->title ?? ucwords(str_replace(['-', '_'], ' ', $filename)),
            'alt_text' => $media->alt_text ?? ucwords(str_replace(['-', '_'], ' ', $filename)),
        ]);
    
        return back()->with('success', 'Media uploaded!');
    }
    


    public function update(Request $request, Media $media)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'alt_text' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'new_image' => 'nullable|image|mimes:jpeg,png,webp,avif|max:10240',
            'transform' => 'nullable|array',
        ]);
    
        // Optional image replace
        if ($request->hasFile('new_image')) {
            app(ImageService::class)->replaceImage($media, $request->file('new_image'));
        }
    
        // 🏷️ Tags Parse
        $tags = collect(explode(',', $request->input('tags')))
            ->map(fn($tag) => trim($tag))
            ->filter()
            ->unique()
            ->values()
            ->toArray();
    
        // ✅ Transformations Process
        $transform = $request->input('transform');
        if ($transform) {
            app(ImageService::class)->applyTransformations($media, $transform);
        }
    
        // Update Info
        $media->update([
            'title' => $request->title,
            'alt_text' => $request->alt_text,
            'description' => $request->description,
            'tags' => $tags,
        ]);

    
        return back()->with('success', 'Media updated with transformations!');
    }
    



    public function popup(Request $request)
    {
        $media = Media::latest()->paginate(30);
        return view('media.popup', compact('media'));
    }
    
    public function insertModal()
    {
        $media = Media::where('mime_type', 'like', 'image/%')->latest()->limit(100)->get();
        return view('admin.media.insert-modal', compact('media'));
    }
    
    
    

    public function sort(Request $request)
    {
        $ids = $request->input('ids', []);
    
        foreach ($ids as $index => $id) {
            Media::where('id', $id)->update(['position' => $index + 1]);
        }
    
        return response()->json(['status' => 'success']);
    }
    
    
    

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
    
        if (empty($ids)) {
            return back()->with('error', 'No items selected.');
        }
    
        $mediaItems = Media::whereIn('id', $ids)->get();
    
        foreach ($mediaItems as $media) {
            // Delete original file
            @unlink(public_path("uploads/{$media->folder}/{$media->filename}"));
    
            // Delete all resized files
            if (is_array($media->meta_data)) {
                foreach ($media->meta_data as $path) {
                    @unlink(public_path($path));
                }
            }
    
            $media->delete();
        }
    
        return back()->with('success', 'Selected media items deleted successfully.');
    }
    
    
}
