<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::whereNull('parent_id')
            ->orderBy('sort_order')
            ->with(['children' => function ($q) {
                $q->orderBy('sort_order')->with('children'); // shallow; ভিউতে রিকার্সিভ
            }])->get();

        // create/edit form data
        $parents = Menu::orderBy('title')->get();

        return view('admin.menus.index', compact('menus', 'parents'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        Menu::create($data);
        $this->forgetCache();

        return redirect()->route('admin.menus.index')->with('success', 'Menu created.');
    }

    public function update(Request $request, Menu $menu)
    {
        $data = $this->validateData($request, $menu->id);
        $menu->update($data);
        $this->forgetCache();

        return redirect()->route('admin.menus.index')->with('success', 'Menu updated.');
    }

    public function destroy(Menu $menu)
    {
        // children থাকলে parent করুন বা cascade (এখন parent_id=null করে দিচ্ছি)
        Menu::where('parent_id', $menu->id)->update(['parent_id' => null]);
        $menu->delete();
        $this->forgetCache();

        return back()->with('success', 'Menu deleted.');
    }

    public function toggle(Menu $menu)
    {
        $menu->update(['is_active' => ! $menu->is_active]);
        $this->forgetCache();
        return back()->with('success', 'Menu status updated.');
    }

    public function reorder(Request $request)
    {
        $tree = $request->all(); // nested array

        DB::transaction(function () use ($tree) {
            $this->applyOrder($tree, null);
        });

        $this->forgetCache();

        return response()->json(['ok' => true]);
    }

    private function applyOrder(array $nodes, $parentId)
    {
        foreach ($nodes as $index => $node) {
            Menu::whereKey($node['id'])->update([
                'parent_id'  => $parentId,
                'sort_order' => $index,
            ]);
            if (!empty($node['children'])) {
                $this->applyOrder($node['children'], $node['id']);
            }
        }
    }

    private function validateData(Request $request, $id = null): array
    {
        return $request->validate([
            'title'      => 'required|string|max:255',
            'url'        => 'nullable|string|max:2048',
            'menu_type'  => 'required|in:link,dropdown,mega',
            'location'   => 'required|in:header,footer,both',
            'parent_id'  => 'nullable|exists:menus,id|not_in:' . $id,
            'sort_order' => 'nullable|integer|min:0',
            'is_active'  => 'nullable|boolean',
            'target'     => 'required|in:_self,_blank',
            'icon'       => 'nullable|string|max:255',
        ]);
    }

    private function forgetCache(): void
    {
        Cache::forget('nav_header');
    }
}
