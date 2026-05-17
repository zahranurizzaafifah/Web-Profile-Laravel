<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function edit(): View
    {
        $contact = Contact::query()->latest()->first();

        return view('admin.contact.edit', compact('contact'));
    }

    public function update(UpdateContactRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $contact = Contact::query()->latest()->first();

        if ($contact) {
            $contact->update($data);
        } else {
            $user = \App\Models\User::query()->first();
            if ($user) {
                $data['user_id'] = $user->id;
            }
            Contact::query()->create($data);
        }

        return redirect()->route('admin.contact.edit')->with('success', 'Contact berhasil disimpan.');
    }
}
