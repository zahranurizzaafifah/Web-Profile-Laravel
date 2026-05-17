<?php

namespace App\Services;

use App\Models\Profile;
use Illuminate\Support\Facades\Schema;

class ProfileService
{
    public function getProfileData(): object
    {
        if (! Schema::hasTable('profiles')) {
            return (object) [
                'name' => 'Zahra Nurizza Afifah',
                'program' => 'Teknologi Multimedia Broadcasting – PENS',
                'class_name' => '2 Multimedia Broadcasting A',
                'bio' => 'Mahasiswa Teknologi Multimedia Broadcasting di Politeknik Elektronika Negeri Surabaya (PENS) yang memiliki minat pada multimedia kreatif, desain grafis, fotografi, videografi, dan editing.',
                'hobbies' => ['Membaca', 'Desain grafis', 'Fotografi dan videografi', 'Editing foto & video', 'Proyek multimedia kreatif'],
                'skills' => ['Adobe Photoshop', 'Adobe Premiere Pro', 'Canva', 'Microsoft Office', 'Fotografi & Videografi', 'Editing Multimedia', 'Dasar HTML & PHP'],
            ];
        }

        return Profile::query()->latest()->first() ?? (object) [
            'name' => 'Zahra Nurizza Afifah',
            'program' => 'Teknologi Multimedia Broadcasting – PENS',
            'class_name' => '2 Multimedia Broadcasting A',
            'bio' => 'Mahasiswa Teknologi Multimedia Broadcasting di Politeknik Elektronika Negeri Surabaya (PENS) yang memiliki minat pada multimedia kreatif, desain grafis, fotografi, videografi, dan editing.',
            'hobbies' => ['Membaca', 'Desain grafis', 'Fotografi dan videografi', 'Editing foto & video', 'Proyek multimedia kreatif'],
            'skills' => ['Adobe Photoshop', 'Adobe Premiere Pro', 'Canva', 'Microsoft Office', 'Fotografi & Videografi', 'Editing Multimedia', 'Dasar HTML & PHP'],
        ];
    }
}
