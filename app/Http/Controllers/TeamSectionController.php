<?php

// app/Http/Controllers/TeamMemberController.php
namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller;


class TeamSectionController extends Controller
{
    public function index(Request $request)
    {
        $search  = trim($request->get('q', ''));
        $status  = $request->get('status', 'all');   // all|active|inactive
        $perPage = (int) $request->get('per_page', 12);

        $q = TeamMember::query();
        if ($status === 'active')   $q->where('is_active', true);
        if ($status === 'inactive') $q->where('is_active', false);

        if ($search !== '') {
            $q->where(function ($qq) use ($search) {
                $qq->where('name', 'like', "%{$search}%")
                    ->orWhere('role', 'like', "%{$search}%");
            });
        }

        $members = $q->ordered()->paginate(max(6, min($perPage, 60)))->withQueryString();

        // ⬅️ ভিউ নাম ঠিক করা
        return view('pages.team.team-index', compact('members', 'search', 'status', 'perPage'));
    }


    public function create()
    {
        return view('pages.team.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'role'         => 'nullable|string|max:255',
            'image_url'    => 'nullable|url|max:2048',
            'image'        => 'nullable|image|max:4096',
            'tags_input'   => 'nullable|string|max:1000', // comma-separated
            'order'        => 'nullable|integer|min:0',
            'is_active'    => 'nullable|boolean',
            'linkedin_url' => 'nullable|url|max:2048',
            'twitter_url'  => 'nullable|url|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('team', 'public');
        }

        $data['tags'] = $this->parseTags($data['tags_input'] ?? '');
        unset($data['tags_input']);

        $data['is_active'] = (bool) $request->boolean('is_active', true);

        TeamMember::create($data);

        return redirect()->route('team.index')->with('success', 'Team member created.');
    }

    public function edit(TeamMember $team)
    {
        return view('pages.team.edit', ['member' => $team]);
    }

    public function update(Request $request, TeamMember $team)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'role'         => 'nullable|string|max:255',
            'image_url'    => 'nullable|url|max:2048',
            'image'        => 'nullable|image|max:4096',
            'tags_input'   => 'nullable|string|max:1000',
            'order'        => 'nullable|integer|min:0',
            'is_active'    => 'nullable|boolean',
            'linkedin_url' => 'nullable|url|max:2048',
            'twitter_url'  => 'nullable|url|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($team->image_path) Storage::disk('public')->delete($team->image_path);
            $data['image_path'] = $request->file('image')->store('team', 'public');
        }

        $data['tags'] = $this->parseTags($data['tags_input'] ?? '');
        unset($data['tags_input']);

        $data['is_active'] = (bool) $request->boolean('is_active', true);

        $team->update($data);

        return redirect()->route('team.index')->with('success', 'Team member updated.');
    }


    /**
     * Public Team page: pages.team ভিউতে teamCards পাস করবে
     */
public function showTeamPage()
{
    $teamCards = TeamMember::active()->ordered()->get()->map(function ($m) {
        return [
            'name'     => $m->name,
            'role'     => $m->role,
            'src'      => $m->image_src,
            'tags'     => is_array($m->tags) ? $m->tags : [],
            'badge'    => 'Leadership',
            // ⬇️ সোশ্যাল লিংকগুলো পাঠাচ্ছি
            'linkedin' => $m->linkedin_url,
            'facebook' => $m->facebook_url ?? $m->twitter_url, // FB না থাকলে টুইটার fallback (ইচ্ছা হলে বাদ দাও)
        ];
    })->values()->all();

    if (empty($teamCards)) {
        $dummy = [
            'name'  => 'Cody C. Jensen',
            'role'  => 'CEO & Founder',
            'src'   => 'https://www.Searchbloom.com/wp-content/uploads/2019/08/Cody-Jensen.jpg',
            'tags'  => ['Lead Gen Strategy','Cold Email Deliverability','CRM & Revenue Analytics'],
            'badge' => 'Leadership',
            'linkedin' => 'https://www.linkedin.com/',   // optional
            'facebook' => 'https://www.facebook.com/',   // optional
        ];
        $teamCards = array_fill(0, 6, $dummy);
    }

    return view('pages.team', compact('teamCards'));
}

    public function destroy(TeamMember $team)
    {
        $team->delete();
        return redirect()->route('team.index')->with('success', 'Team member deleted.');
    }

    // --- helpers ---
    private function parseTags(string $csv): array|null
    {
        if (trim($csv) === '') return null;
        $arr = array_filter(array_map(function ($s) {
            return trim(preg_replace('/\s+/', ' ', $s));
        }, explode(',', $csv)));
        return array_values(array_unique($arr));
    }
}
