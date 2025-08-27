<?php
// app/Http/Controllers/AwardsController.php
namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AwardsController extends Controller
{
 public function index(Request $request)
    {
        // query params
        $search   = trim($request->get('q', ''));
        $status   = $request->get('status', 'all'); // all|active|inactive
        $sort     = $request->get('sort', 'order'); // order|year|created
        $dir      = $request->get('dir', 'asc');    // asc|desc
        $perPage  = (int) $request->get('per_page', 12);

        $q = Award::query();

        // status filter
        if ($status === 'active')   $q->where('is_active', true);
        if ($status === 'inactive') $q->where('is_active', false);

        // search (title + year)
        if ($search !== '') {
            $q->where(function($qq) use ($search){
                $qq->where('title', 'like', "%{$search}%")
                   ->orWhere('year', $search);
            });
        }

        // sort
        if ($sort === 'year') {
            $q->orderBy('year', $dir === 'desc' ? 'desc' : 'asc')->orderBy('order')->orderBy('id');
        } elseif ($sort === 'created') {
            $q->orderBy('created_at', $dir === 'desc' ? 'desc' : 'asc');
        } else { // default by order
            $q->orderBy('order', $dir === 'desc' ? 'desc' : 'asc')
              ->orderBy('year', 'desc')->orderBy('id');
        }

        $awards = $q->paginate(max(6, min($perPage, 60)))->withQueryString();

        return view('pages.awards.awards-index', compact('awards', 'search', 'status', 'sort', 'dir', 'perPage'));
    }

    public function create()
    {
        return view('pages.awards.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'      => 'required|string|max:255',
            'year'       => 'nullable|integer|min:1900|max:2100',
            'order'      => 'nullable|integer|min:0',
            'image_url'  => 'nullable|url|max:2048',
            'image'      => 'nullable|image|max:3072', // 3MB
            'is_active'  => 'nullable|boolean',
        ]);

        // File upload (if provided)
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('awards', 'public');
            // Prefer uploaded image; clear image_url if you want
            // $data['image_url'] = null;
        }

        $data['is_active'] = (bool) $request->boolean('is_active', true);
        Award::create($data);

        return redirect()->route('awards.index')->with('success', 'Award created.');
    }

    public function edit(Award $award)
    {
        return view('pages.awards.edit', compact('award'));
    }

    public function update(Request $request, Award $award)
    {
        $data = $request->validate([
            'title'      => 'required|string|max:255',
            'year'       => 'nullable|integer|min:1900|max:2100',
            'order'      => 'nullable|integer|min:0',
            'image_url'  => 'nullable|url|max:2048',
            'image'      => 'nullable|image|max:3072',
            'is_active'  => 'nullable|boolean',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            // delete old if existed
            if ($award->image_path) Storage::disk('public')->delete($award->image_path);
            $data['image_path'] = $request->file('image')->store('awards', 'public');
            // $data['image_url'] = null;
        }

        $data['is_active'] = (bool) $request->boolean('is_active', true);
        $award->update($data);

        return redirect()->route('awards.index')->with('success', 'Award updated.');
    }

    // Awards section page (leadgen-home)
    public function show()
    {
        // 1) DB → cards
        $cards = Award::active()->ordered()->get()
            ->map(function ($a) {
                $src = $a->image_src; // accessor (image_path or image_url)
                if (!$src) return null; // skip if no image
                $label = $a->title . ($a->year ? ' — ' . $a->year : '');
                return [
                    'src'   => $src,
                    'alt'   => $label,
                    'label' => $label,
                ];
            })
            ->filter() // remove nulls
            ->values();

        // 2) Fallback → if empty, use your static list
        if ($cards->isEmpty()) {
            $cards = collect([
                ['src' => 'https://www.Searchbloom.com/wp-content/uploads/2024/12/global_award_fall_2024.png',  'alt' => 'Clutch Global — B2B Lead Generation (Fall 2024)', 'label' => 'Clutch Global — B2B Lead Gen (Fall 2024)'],
                ['src' => 'https://www.Searchbloom.com/wp-content/uploads/2024/12/global_award_spring_2024.png', 'alt' => 'Clutch Global — Cold Email (Spring 2024)',         'label' => 'Clutch Global — Cold Email (Spring 2024)'],
                ['src' => 'https://www.Searchbloom.com/wp-content/uploads/2024/12/clutch_1000_2023_award.png', 'alt' => 'Clutch Top 1000 — 2023',                          'label' => 'Clutch Top 1000 — 2023'],
                ['src' => 'https://www.Searchbloom.com/wp-content/uploads/2024/12/global_award_2023.png',      'alt' => 'Clutch Global — Fall 2023',                      'label' => 'Clutch Global — Fall 2023'],
                ['src' => 'https://www.Searchbloom.com/wp-content/uploads/2024/12/global_award_fall_2024.png',  'alt' => 'Clutch Global — B2B Lead Generation (Fall 2024)', 'label' => 'Clutch Global — B2B Lead Gen (Fall 2024)'],
                ['src' => 'https://www.Searchbloom.com/wp-content/uploads/2024/12/global_award_spring_2024.png', 'alt' => 'Clutch Global — Cold Email (Spring 2024)',         'label' => 'Clutch Global — Cold Email (Spring 2024)'],
                ['src' => 'https://www.Searchbloom.com/wp-content/uploads/2024/12/clutch_1000_2023_award.png', 'alt' => 'Clutch Top 1000 — 2023',                          'label' => 'Clutch Top 1000 — 2023'],
                ['src' => 'https://www.Searchbloom.com/wp-content/uploads/2024/12/global_award_2023.png',      'alt' => 'Clutch Global — Fall 2023',                      'label' => 'Clutch Global — Fall 2023'],
            ]);
        }

        // send to your existing page view
        return view('pages.awards', ['cards' => $cards]);
    }

    public function destroy(Award $award)
    {
        // soft delete; (optional) delete image file physically on forceDelete only
        $award->delete();
        return redirect()->route('awards.index')->with('success', 'Award deleted.');
    }
}
