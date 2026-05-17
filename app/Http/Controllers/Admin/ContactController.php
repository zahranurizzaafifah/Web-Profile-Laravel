<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function __construct(
        private ContactService $contactService
    ) {}

    public function edit(): View
    {
        $contact = Contact::query()->latest()->first();

        return view('admin.contact.edit', compact('contact'));
    }

    public function update(UpdateContactRequest $request): RedirectResponse
    {
        $this->contactService->updateContact($request->validated());

        return redirect()->route('admin.contact.edit')->with('success', 'Contact berhasil disimpan.');
    }
}
