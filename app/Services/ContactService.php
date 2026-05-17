<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Support\Facades\Schema;

class ContactService
{
    public function getContactData(): object
    {
        if (! Schema::hasTable('contacts')) {
            return (object) [
                'email' => 'zahra@example.com',
                'phone' => '+62 812-3456-7890',
                'instagram' => '@zahranurizza',
                'github' => 'github.com/zahranurizza',
                'location' => 'Surabaya, Indonesia',
            ];
        }

        return Contact::query()->latest()->first() ?? (object) [
            'email' => 'zahra@example.com',
            'instagram' => '@zahranurizza',
            'github' => 'github.com/zahranurizzaafifah',
            'location' => 'Surabaya, Indonesia',
        ];
    }

    public function updateContact(array $data)
    {
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
    }
}
