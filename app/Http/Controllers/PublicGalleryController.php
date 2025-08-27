<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use Illuminate\Http\Request;

class PublicGalleryController extends Controller
{
    public function index(Request $req)
    {
        $perPage = (int) $req->integer('per_page', 24);
        $sort    = $req->input('sort', 'order'); // order|year|created
        $dir     = $req->input('dir', 'asc');    // asc|desc

        $q = GalleryItem::query()->active();

        if ($s = trim($req->input('search',''))) {
            $q->where(function($w) use ($s) {
                $w->where('caption','like',"%{$s}%")
                  ->orWhere('alt','like',"%{$s}%")
                  ->orWhere('tag','like',"%{$s}%");
            });
        }
        if ($t = $req->input('tag'))  $q->where('tag',$t);
        if ($y = $req->input('year')) $q->where('year',(int)$y);

        // sorting
        if ($sort === 'year')      $q->orderBy('year', $dir)->orderBy('position')->orderByDesc('id');
        elseif ($sort === 'created') $q->orderBy('created_at', $dir)->orderBy('position')->orderByDesc('id');
        else                        $q->orderBy('position', $dir)->orderByDesc('id');

        $items = $q->paginate($perPage)->withQueryString();

        $tags  = GalleryItem::query()->active()->select('tag')->whereNotNull('tag')->distinct()->orderBy('tag')->pluck('tag');
        $years = GalleryItem::query()->active()->select('year')->whereNotNull('year')->distinct()->orderByDesc('year')->pluck('year');

        return view('components.sections.gallery-memory', compact('items','tags','years','sort','dir','perPage'));
    }
}
