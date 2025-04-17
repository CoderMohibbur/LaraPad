<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiscussionSetting;
use Illuminate\Http\Request;

class DiscussionSettingController extends Controller
{
    public function index()
    {
        $setting = DiscussionSetting::first();
        return view('admin.discussion-settings.index', compact('setting'));
    }

    public function edit()
    {
        $setting = DiscussionSetting::first();
        return view('admin.discussion-settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $data = $request->all();

        // Boolean fields (unchecked fields don't come in request, so we need to handle them manually)
        $booleanFields = [
            'notify_linked_blogs',
            'allow_pingbacks',
            'allow_comments',
            'require_name_email',
            'require_registered_user',
            'break_comments_pages',
            'email_on_comment',
            'email_on_moderation',
            'manual_approve',
            'previously_approved',
            'show_avatars',
        ];

        foreach ($booleanFields as $field) {
            $data[$field] = $request->has($field);
        }

        $setting = DiscussionSetting::firstOrNew([]);
        $setting->fill($data);
        $setting->save();

        return redirect()->route('admin.discussion-settings.index')->with('success', 'Discussion settings updated successfully.');
    }
}
