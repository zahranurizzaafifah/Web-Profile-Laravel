<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function edit(): View
    {
        $contact = Contact::query()->latest()->first();

        return view('admin.contact.edit', compact('contact'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'github' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
        ]);

        $contact = Contact::query()->latest()->first();

        if ($contact) {
            $contact->update($data);
        } else {
            Contact::query()->create($data);
        }

        return redirect()->route('admin.contact.edit')->with('success', 'Contact berhasil disimpan.');
    }
}
