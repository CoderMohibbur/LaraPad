<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GalleryItemController extends Controller
{
    public function index(Request $req)
    {
        $q = GalleryItem::query();

        // Filters: search, tag, year, status
        if ($s = trim($req->input('search'))) {
            $q->where(static function ($w) use ($s) {
                $w->where('caption', 'like', "%{$s}%")
                    ->orWhere('alt', 'like', "%{$s}%")
                    ->orWhere('tag', 'like', "%{$s}%")
                    ->orWhere('image_path', 'like', "%{$s}%");
            });
        }
        if ($tag = $req->input('tag'))   $q->where('tag', $tag);
        if ($year = $req->input('year')) $q->where('year', (int)$year);
        if (!is_null($req->input('is_active'))) $q->where('is_active', (bool)$req->boolean('is_active'));

        $items = $q->ordered()->paginate(24)->withQueryString();

        $tags  = GalleryItem::query()->select('tag')->whereNotNull('tag')->distinct()->pluck('tag');
        $years = GalleryItem::query()->select('year')->whereNotNull('year')->distinct()->orderByDesc('year')->pluck('year');

        return view('pages.gallery.index', compact('items', 'tags', 'years'));
    }

    public function create()
    {
        $item = new GalleryItem();
        return view('pages.gallery.create', compact('item'));
    }

    public function store(Request $req)
    {
        $data = $this->validated($req);

        if ($req->hasFile('image')) {
            $path = $req->file('image')->store('uploads/gallery', 'public');
            $data['image_path'] = '/storage/' . $path;
        }

        $data['is_active'] = $req->boolean('is_active');

        GalleryItem::create($data);

        return redirect()->route('gallery-items.index')->with('ok', 'Gallery item created');
    }


    public function edit(GalleryItem $gallery_item)
    {
        $item = $gallery_item;
        return view('pages.gallery.edit', compact('item'));
    }

    public function update(Request $req, GalleryItem $gallery_item)
    {
        $data = $this->validated($req, updating: true);

        // ফাইল এলে আপলোড
        if ($req->hasFile('image')) {
            $path = $req->file('image')->store('uploads/gallery', 'public');
            $data['image_path'] = '/storage/' . $path;
        } else {
            // ফর্মে image_path ফিল্ড পাঠানো না হলে/খালি হলে পুরনোটা রেখে দেই
            if (!array_key_exists('image_path', $data) || blank($data['image_path'])) {
                unset($data['image_path']);
            }
        }

        // checkbox → boolean
        $data['is_active'] = $req->boolean('is_active');

        $gallery_item->update($data);

        return redirect()->route('gallery-items.index')->with('ok', 'Gallery item updated');
    }


    // /gallery-memory?tag=...&year=...&limit=12
    public function show(Request $req)
    {
        $limit = (int) $req->integer('limit', 12);

        $items = GalleryItem::query()
            ->where('is_active', true)
            ->when($req->filled('tag'),  fn($q) => $q->where('tag', $req->string('tag')))
            ->when($req->filled('year'), fn($q) => $q->where('year', (int) $req->year))
            ->orderBy('position')
            ->orderByDesc('id')
            ->limit($limit)
            ->get();

        // শুধু গ্যালারি মেমোরি ব্লেডটাই রিটার্ন করবে
        return view('components.sections.gallery-memory', [
            'items' => $items,
            // চাইলে গ্রিড কলাম/শিরোনাম পাস করা যাবে (ঐচ্ছিক)
            'cols'  => $req->input('cols', 'grid-cols-2 md:grid-cols-3 lg:grid-cols-4'),
            'title' => $req->input('title'),
        ]);
    }


    public function destroy(GalleryItem $gallery_item)
    {
        $gallery_item->delete();
        return back()->with('ok', 'Gallery item deleted');
    }

    private function validated(Request $req, bool $updating = false): array
    {
        $yearMax = (int) date('Y') + 1;

        $base = [
            'alt'        => ['nullable', 'string', 'max:255'],
            'caption'    => ['nullable', 'string', 'max:255'],
            'tag'        => ['nullable', 'string', 'max:50'],
            'year'       => ['nullable', 'integer', 'min:1900', 'max:' . $yearMax],
            'position'   => ['nullable', 'integer', 'min:0'],
            'is_active'  => ['nullable', 'boolean'],
            'meta'       => ['nullable', 'array'],
        ];

        if ($updating) {
            // Update: পুরনো ছবি থাকলে নতুন কিছু না দিলেও চলবে
            $rules = [
                'image'      => ['sometimes', 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
                'image_path' => ['sometimes', 'nullable', 'string', 'max:1024'],
            ] + $base;
        } else {
            // Create: অন্তত যেকোনো একটাই দিতে হবে
            $rules = [
                'image'      => ['nullable', 'required_without:image_path', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
                'image_path' => ['nullable', 'required_without:image', 'string', 'max:1024'],
            ] + $base;
        }

        return $req->validate($rules, [], [
            'image'      => 'Upload Image',
            'image_path' => 'Image URL/Path',
        ]);
    }
}
