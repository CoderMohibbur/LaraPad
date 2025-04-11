<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use Spatie\Permission\Models\Role;

class GeneralController extends Controller
{
    public function general()
    {
        return view('admin.settings.general', [
            'roles' => Role::all(),
            'languages' => ['en' => 'English', 'bn' => 'Bangla'],
            'weekdays' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
        ]);
    }

    public function store(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            General::set($key, is_array($value) ? json_encode($value) : $value);
        }

        return back()->with('success', 'Settings updated successfully!');
    }
}
