<?php

// app/Http/Controllers/Admin/WritingSettingController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WritingSetting;
use Illuminate\Http\Request;

class WritingSettingController extends Controller
{
    public function index()
    {
        $setting = WritingSetting::first();
        return view('admin.writing-settings.index', compact('setting'));
    }

    public function edit()
    {
        $setting = WritingSetting::first();
        return view('admin.writing-settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'mail_port' => 'nullable|integer',
            'password' => 'nullable|string',
            'update_services' => 'nullable|string',
        ]);

        $setting = WritingSetting::firstOrNew([]);
        $setting->fill($request->all());
        $setting->save();

        return redirect()->route('admin.writing-settings.index')->with('success', 'Settings updated successfully!');
    }
}
