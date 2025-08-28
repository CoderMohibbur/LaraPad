<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('serial')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'quote' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'rating' => 'nullable|integer|min:1|max:5',
            'serial' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/testimonials', 'public');
            $data['image'] = 'storage/' . $path;
        }

        Testimonial::create($data);
        return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'quote' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'rating' => 'nullable|integer|min:1|max:5',
            'serial' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($testimonial->image && file_exists(public_path($testimonial->image))) {
                unlink(public_path($testimonial->image));
            }

            $path = $request->file('image')->store('uploads/testimonials', 'public');
            $data['image'] = 'storage/' . $path;
        }

        $testimonial->update($data);
        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function show()
{

    $latestPosts = \App\Models\Post::with(['author','tags'])
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->latest('published_at')
        ->take(3)
        ->get();

    if ($latestPosts->isEmpty()) {
        $latestPosts = collect([
            [
                'title'   => 'Cold Email Deliverability in 2025: DMARC, SPF, DKIM & The Inboxing Checklist',
                'slug'    => 'cold-email-deliverability-2025',
                'excerpt' => 'Stop landing in Promotions. Sender reputation, sub-domain strategy...',
                'author'  => 'Ayesha Rahman',
                'avatar'  => 'https://i.pravatar.cc/80?img=21',
                'cover'   => 'https://images.pexels.com/photos/1181343/pexels-photo-1181343.jpeg',
                'read'    => 7,
                'date'    => '2025-08-10',
                'tags'    => ['Deliverability','DMARC','Warm-up'],
            ],
            [
                'title'   => 'Personalized First Lines at Scale',
                'slug'    => 'personalized-first-lines-cadence',
                'excerpt' => 'How to write value-first copy & get real replies.',
                'author'  => 'Khalid Hossain',
                'avatar'  => 'https://i.pravatar.cc/80?img=22',
                'cover'   => 'https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg',
                'read'    => 6,
                'date'    => '2025-08-05',
                'tags'    => ['Copywriting','Cadence','Personalization'],
            ],
        ]);
    }

    // এখানে testimonials না থাকলে খালি অ্যারে পাঠাচ্ছি
    return view('pages.home', [
        'latestPosts'   => $latestPosts,
        'testimonials'  => [],   // ← fixes the error
    ]);
}

    

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image && file_exists(public_path($testimonial->image))) {
            unlink(public_path($testimonial->image));
        }

        $testimonial->delete();
        return back()->with('success', 'Testimonial deleted.');
    }
}
