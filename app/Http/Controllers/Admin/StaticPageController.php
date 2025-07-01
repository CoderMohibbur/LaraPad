<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class StaticPageController extends Controller
{
    public function edit(Request $request)
    {
        $slug = $request->get('slug');

        $viewPath = resource_path("views/pages/{$slug}.blade.php");

        if (!File::exists($viewPath)) {
            abort(404, 'Page not found.');
        }

        $content = File::get($viewPath);

        return view('Admin.static-pages.', compact('slug', 'content'));
    }

    public function update(Request $request)
    {
        $slug = $request->input('slug');
        $content = $request->input('content');

        $viewPath = resource_path("views/pages/{$slug}.blade.php");

        if (!File::exists($viewPath)) {
            abort(404, 'Page not found.');
        }

        File::put($viewPath, $content);

        return redirect()->route('pages.index')->with('success', "Page '{$slug}' updated successfully.");
    }
}
