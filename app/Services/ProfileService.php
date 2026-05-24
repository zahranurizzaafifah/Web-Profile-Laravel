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
                'bio' => 'Saya adalah Mahasiswa Teknologi Multimedia Broadcasting yang memiliki minat besar di bidang desain grafis, fotografi, dan produksi media digital. Terbiasa menggunakan berbagai software desain untuk membuat konten visual yang kreatif dan komunikatif.',
                'hobbies' => ['Desain Grafis', 'Fotografi', 'Videografi', 'Editing'],
                'skills' => ['Desain Grafis & Produksi', 'Editing Video & Foto', 'Fotografi', 'Public Speaking', 'Microsoft 365', 'Kerja Tim & Komunikasi Efektif'],
            ];
        }

        return Profile::query()->latest()->first() ?? (object) [
            'name' => 'Zahra Nurizza Afifah',
            'program' => 'Teknologi Multimedia Broadcasting – PENS',
            'class_name' => '2 Multimedia Broadcasting A',
            'bio' => 'Saya adalah Mahasiswa Teknologi Multimedia Broadcasting yang memiliki minat besar di bidang desain grafis, fotografi, dan produksi media digital. Terbiasa menggunakan berbagai software desain untuk membuat konten visual yang kreatif dan komunikatif.',
            'hobbies' => ['Desain Grafis', 'Fotografi', 'Videografi', 'Editing'],
            'skills' => ['Desain Grafis & Produksi', 'Editing Video & Foto', 'Fotografi', 'Public Speaking', 'Microsoft 365', 'Kerja Tim & Komunikasi Efektif'],
        ];
    }
}
