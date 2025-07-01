<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PageFileController extends Controller
{
    public function index()
    {
        // Static blade pages
        $files = File::files(resource_path('views/pages'));
        $pages = [];

        foreach ($files as $file) {
            $name = $file->getFilenameWithoutExtension();
            $pages[] = [
                'title' => ucfirst(str_replace('-', ' ', $name)),
                'slug' => $name,
            ];
        }

        return view('admin.page.index', compact('pages'));
    }
    public function edit($slug)
    {
        $path = resource_path("views/pages/{$slug}.blade.php");
        if (!File::exists($path)) {
            abort(404);
        }

        $content = File::get($path);
        return view('admin.page.edit', compact('slug', 'content'));
    }

    public function update(Request $request, $slug)
    {
        $content = $request->input('content');

        if (str_contains($content, '<?php')) {
            return response()->json(['error' => 'PHP not allowed'], 422);
        }

        $path = resource_path("views/pages/{$slug}.blade.php");
        File::put($path, $content);

        return response()->json(['success' => true]);
    }
}
