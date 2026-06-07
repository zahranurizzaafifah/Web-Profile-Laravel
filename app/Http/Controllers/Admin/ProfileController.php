<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(): View
    {
        $profile = Profile::query()->latest()->first();
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'program'    => ['nullable', 'string', 'max:255'],
            'class_name' => ['nullable', 'string', 'max:255'],
            'bio'        => ['nullable', 'string'],
            'photo'      => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            // JSON fields as raw strings — validated loosely
        ]);

        $profile = Profile::query()->latest()->first()
            ?? new Profile();

        // Skills: textarea → array
        $skills = collect(explode("\n", $request->input('skills_raw', '')))
            ->map(fn($s) => trim($s))
            ->filter()
            ->values()
            ->all();

        // Hobbies: textarea → array
        $hobbies = collect(explode("\n", $request->input('hobbies_raw', '')))
            ->map(fn($s) => trim($s))
            ->filter()
            ->values()
            ->all();

        // Education: repeater fields
        $education = [];
        $eduTitles = $request->input('edu_title', []);
        foreach ($eduTitles as $i => $title) {
            if (blank($title)) continue;
            $education[] = [
                'title'  => $title,
                'org'    => $request->input('edu_org', [])[$i] ?? '',
                'period' => $request->input('edu_period', [])[$i] ?? '',
                'desc'   => $request->input('edu_desc', [])[$i] ?? '',
            ];
        }

        // Experience: repeater fields
        $experience = [];
        $expTitles = $request->input('exp_title', []);
        foreach ($expTitles as $i => $title) {
            if (blank($title)) continue;
            $experience[] = [
                'title'  => $title,
                'org'    => $request->input('exp_org', [])[$i] ?? '',
                'period' => $request->input('exp_period', [])[$i] ?? '',
                'desc'   => $request->input('exp_desc', [])[$i] ?? '',
            ];
        }

        // Organizations: repeater fields
        $organizations = [];
        $orgTitles = $request->input('org_title', []);
        foreach ($orgTitles as $i => $title) {
            if (blank($title)) continue;
            $organizations[] = [
                'title'  => $title,
                'year'   => $request->input('org_year', [])[$i] ?? '',
                'icon'   => $request->input('org_icon', [])[$i] ?? '🏆',
                'desc'   => $request->input('org_desc', [])[$i] ?? '',
            ];
        }

        // Photo upload
        $photoUrl = $profile->photo_url;
        if ($request->hasFile('photo')) {
            if ($photoUrl && str_starts_with($photoUrl, '/storage/')) {
                Storage::delete(str_replace('/storage/', 'public/', $photoUrl));
            }
            $path = $request->file('photo')->store('profile', 'public');
            $photoUrl = '/storage/' . $path;
        }

        $data = [
            'name'          => $request->input('name'),
            'program'       => $request->input('program'),
            'class_name'    => $request->input('class_name'),
            'bio'           => $request->input('bio'),
            'skills'        => $skills,
            'hobbies'       => $hobbies,
            'education'     => $education,
            'experience'    => $experience,
            'organizations' => $organizations,
            'photo_url'     => $photoUrl,
        ];

        if (!$profile->exists) {
            $user = \App\Models\User::query()->first();
            if ($user) $data['user_id'] = $user->id;
            Profile::create($data);
        } else {
            $profile->update($data);
        }

        return redirect()->route('admin.profile.edit')->with('success', 'Profil berhasil disimpan!');
    }
}
