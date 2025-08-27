<?php

// app/Http/Controllers/ReviewsController.php
// app/Http/Controllers/ReviewsController.php
namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index(Request $request)
    {
        $search  = trim($request->get('q', ''));
        $status  = $request->get('status', 'all'); // all|active|inactive
        $sort    = $request->get('sort', 'order'); // order|rating|created
        $dir     = $request->get('dir', 'asc');    // asc|desc
        $perPage = (int) $request->get('per_page', 12);

        $q = Review::query();

        if ($status === 'active')   $q->where('is_active', true);
        if ($status === 'inactive') $q->where('is_active', false);

        if ($search !== '') {
            $q->where(function ($qq) use ($search) {
                $qq->where('quote', 'like', "%{$search}%")
                    ->orWhere('reviewer', 'like', "%{$search}%")
                    ->orWhere('verified_label', 'like', "%{$search}%");
            });
        }

        if ($sort === 'rating') {
            $q->orderBy('rating', $dir === 'desc' ? 'desc' : 'asc')->orderBy('order');
        } elseif ($sort === 'created') {
            $q->orderBy('created_at', $dir === 'desc' ? 'desc' : 'asc');
        } else {
            $q->orderBy('order', $dir === 'desc' ? 'desc' : 'asc')->orderByDesc('id');
        }

        $reviews = $q->paginate(max(6, min($perPage, 60)))->withQueryString();

        return view('pages.reviews.index', compact('reviews', 'search', 'status', 'sort', 'dir', 'perPage'));
    }

    public function create()
    {
        return view('pages.reviews.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'rating'         => 'required|numeric|min:0|max:5',
            'quote'          => 'required|string|max:2000',
            'reviewer'       => 'required|string|max:255',
            'verified_label' => 'nullable|string|max:100',
            'order'          => 'nullable|integer|min:0',
            'is_active'      => 'nullable|boolean',
        ]);

        $data['is_active'] = (bool) $request->boolean('is_active', true);
        Review::create($data);

        return redirect()->route('reviews.index')->with('success', 'Review created.');
    }

    public function edit(Review $review)
    {
        return view('pages.reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $data = $request->validate([
            'rating'         => 'required|numeric|min:0|max:5',
            'quote'          => 'required|string|max:2000',
            'reviewer'       => 'required|string|max:255',
            'verified_label' => 'nullable|string|max:100',
            'order'          => 'nullable|integer|min:0',
            'is_active'      => 'nullable|boolean',
        ]);

        $data['is_active'] = (bool) $request->boolean('is_active', true);
        $review->update($data);

        return redirect()->route('reviews.index')->with('success', 'Review updated.');
    }

    // শুধুই সেকশন রেন্ডার—leadgen পেজেও ব্যবহার করতে পারবেন
    public function show()
    {
        // 1) DB থেকে নিয়ে map করি আপনার blade কাঠামোতে
        $reviews = Review::active()->ordered()->get()->map(function ($r) {
            return [
                'rating'   => number_format((float)$r->rating, 1),
                'quote'    => $r->quote,
                'role'     => $r->reviewer,
                'verified' => $r->verified_label ?: 'Verified Review',
            ];
        })->values()->all();

        // 2) কিছু না পেলে fallback = আপনার স্ট্যাটিক ডামি
        if (empty($reviews)) {
            $reviews = [
                [
                    'rating' => '5.0',
                    'quote'  => 'Clear communication, fast iteration, and steady performance gains across campaigns.',
                    'role'   => 'Marketing Coordinator, Healthcare Provider',
                    'verified' => 'Verified Review',
                ],
                [
                    'rating' => '5.0',
                    'quote'  => 'Our partnership keeps growing—more qualified demos from targeted cold outreach.',
                    'role'   => 'Sales & Marketing Executive, Corporate Gifts',
                    'verified' => 'Verified Review',
                ],
                [
                    'rating' => '5.0',
                    'quote'  => 'They proactively follow up, align on ICP, and keep deliverability spotless.',
                    'role'   => 'National Sales Manager, CPG Brand',
                    'verified' => 'Verified Review',
                ],
                [
                    'rating' => '5.0',
                    'quote'  => 'They listened to concerns and refined sequences until replies felt human.',
                    'role'   => 'Marketing Manager, Beverage Retail',
                    'verified' => 'Verified Review',
                ],
                [
                    'rating' => '5.0',
                    'quote'  => 'Their PPC + email combo unlocked pipeline we could forecast with confidence.',
                    'role'   => 'Sr. BizDev Manager, Pharma',
                    'verified' => 'Verified Review',
                ],
                [
                    'rating' => '5.0',
                    'quote'  => 'SEO depth plus ethical outreach—most impressive mix we’ve worked with.',
                    'role'   => 'Field Marketing Manager, Software',
                    'verified' => 'Verified Review',
                ],
            ];
        }

        // এই ভিউতে আপনার সেকশন আছে — চাইলে অন্য পেজেও পাঠাতে পারেন
        return view('pages.reviews', compact('reviews'));
    }

    public function destroy(Review $review)
    {
        $review->delete(); // soft delete
        return redirect()->route('reviews.index')->with('success', 'Review deleted.');
    }
}
