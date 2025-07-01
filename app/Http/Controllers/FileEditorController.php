<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FileEditorController extends Controller
{
    protected $viewPath = 'resources/views/pages/home-content.blade.php';

    public function edit()
    {
        $content = File::exists(base_path($this->viewPath))
            ? File::get(base_path($this->viewPath))
            : '<h1>New Content</h1>';

        return view('admin.page-editor', compact('content'));
    }

    public function update(Request $request)
    {
        $content = $request->input('content');

        // Validate: prevent PHP code injection
        if (strpos($content, '<?php') !== false) {
            return response()->json(['error' => 'PHP code not allowed!'], 422);
        }

        File::put(base_path($this->viewPath), $content);
        return response()->json(['status' => 'saved']);
    }
}