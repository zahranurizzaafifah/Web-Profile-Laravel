<?php

namespace App\Services;

use App\Models\Profile;
use Illuminate\Support\Facades\Schema;

class ProfileService
{
    private function defaults(): array
    {
        return [
            'name'          => 'Zahra Nurizza Afifah',
            'program'       => 'Teknologi Multimedia Broadcasting – PENS',
            'class_name'    => '2 Multimedia Broadcasting A',
            'bio'           => 'Saya adalah Mahasiswa Teknologi Multimedia Broadcasting yang memiliki minat besar di bidang desain grafis, fotografi, dan produksi media digital.',
            'hobbies'       => ['Desain Grafis', 'Fotografi', 'Videografi', 'Editing'],
            'skills'        => ['Desain Grafis & Produksi', 'Editing Video & Foto', 'Fotografi', 'Public Speaking', 'Microsoft 365', 'Kerja Tim & Komunikasi'],
            'photo_url'     => null,
            'education'     => [
                ['title' => 'Teknologi Multimedia Broadcasting', 'org' => 'PENS', 'period' => '2024 – Sekarang', 'desc' => ''],
                ['title' => 'Desain Komunikasi Visual', 'org' => 'SMK Negeri 13 Surabaya', 'period' => '2021 – 2024', 'desc' => ''],
            ],
            'experience'    => [
                ['title' => 'Vector Designer', 'org' => 'Biro Reklame Surabaya', 'period' => 'Feb 2022 – April 2026', 'desc' => 'Merancang logo, desain stempel, dan aset grafis menggunakan CorelDRAW'],
                ['title' => 'PKL – Fotografer', 'org' => 'Studio Photo Silver', 'period' => '2022 – 2023', 'desc' => 'Teknik pengambilan foto dan editing gambar'],
            ],
            'organizations' => [
                ['icon' => '🎪', 'title' => 'Divisi Acara – Project Multimedia', 'year' => '2024', 'desc' => 'Perencanaan dan pelaksanaan konsep acara multimedia'],
                ['icon' => '🎨', 'title' => 'Tim Kreatif – MMBFEST', 'year' => '2026', 'desc' => 'Mengembangkan ide kreatif untuk konsep acara visual'],
                ['icon' => '🔬', 'title' => 'Lab Tour – DTMK Expo 2026', 'year' => '2026', 'desc' => 'Pemandu kegiatan lab tour'],
            ],
        ];
    }

    public function getProfileData(): object
    {
        if (! Schema::hasTable('profiles')) {
            return (object) $this->defaults();
        }

        $profile = Profile::query()->latest()->first();

        if (! $profile) {
            return (object) $this->defaults();
        }

        // Merge DB data with defaults for any null fields
        $defaults = $this->defaults();
        foreach ($defaults as $key => $val) {
            if (is_null($profile->$key) || (is_array($profile->$key) && empty($profile->$key))) {
                $profile->$key = $val;
            }
        }

        return $profile;
    }
}
