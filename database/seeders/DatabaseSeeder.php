<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = \App\Models\User::factory()->create([
            'name' => 'Zahra Nurizza Afifah',
            'email' => 'zahra@example.com',
        ]);

        $user->profile()->create([
            'name' => 'Zahra Nurizza Afifah',
            'program' => 'Teknologi Multimedia Broadcasting – PENS',
            'class_name' => '2 Multimedia Broadcasting A',
            'bio' => 'Saya adalah Mahasiswa Teknologi Multimedia Broadcasting yang memiliki minat besar di bidang desain grafis, fotografi, dan produksi media digital. Terbiasa menggunakan berbagai software desain untuk membuat konten visual yang kreatif dan komunikatif.',
            'hobbies' => ['Desain Grafis', 'Fotografi', 'Videografi', 'Editing'],
            'skills' => ['Desain Grafis & Produksi', 'Editing Video & Foto', 'Fotografi', 'Public Speaking', 'Microsoft 365', 'Kerja Tim & Komunikasi Efektif'],
        ]);

        $user->portfolios()->createMany([
            ['title' => 'Brand Visual Identity', 'category' => 'Design', 'description' => 'Perancangan identitas visual dan template media sosial untuk kebutuhan kampus.'],
            ['title' => 'Cinematic Short Reel', 'category' => 'Video', 'description' => 'Editing short reel dengan pacing dinamis untuk promosi acara.'],
            ['title' => 'Editorial Photo Series', 'category' => 'Photography', 'description' => 'Seri foto editorial dengan fokus pada komposisi dan tone warna.'],
        ]);

        $user->contact()->create([
            'email' => 'zahra@example.com',
            'phone' => '+62 812-3456-7890',
            'instagram' => '@zahranurizza',
            'github' => 'github.com/zahranurizza',
            'location' => 'Surabaya, Indonesia',
        ]);
    }
}
