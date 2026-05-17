<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Profile::query()->create([
            'name' => 'Zahra Nurizza Afifah',
            'program' => 'Teknologi Multimedia Broadcasting – PENS',
            'class_name' => '2 Multimedia Broadcasting A',
            'bio' => 'Mahasiswa Teknologi Multimedia Broadcasting di Politeknik Elektronika Negeri Surabaya (PENS) yang memiliki minat pada multimedia kreatif, desain grafis, fotografi, videografi, dan editing. Memiliki pengalaman dalam pembuatan konten multimedia, desain visual, serta pengoperasian kamera dan software editing melalui pengalaman magang dan proyek perkuliahan. Mampu bekerja sama dalam tim, memiliki kreativitas tinggi, serta antusias untuk terus mengembangkan kemampuan di bidang industri kreatif dan multimedia.',
            'hobbies' => ['Membaca', 'Desain grafis', 'Fotografi dan videografi', 'Editing foto & video', 'Proyek multimedia kreatif'],
            'skills' => ['Adobe Photoshop', 'Adobe Premiere Pro', 'Canva', 'Microsoft Office', 'Fotografi & Videografi', 'Editing Multimedia', 'Dasar HTML & PHP'],
        ]);

        Portfolio::query()->insert([
            ['title' => 'Brand Visual Identity', 'category' => 'Design', 'description' => 'Perancangan identitas visual dan template media sosial untuk kebutuhan kampus.', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Cinematic Short Reel', 'category' => 'Video', 'description' => 'Editing short reel dengan pacing dinamis untuk promosi acara.', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Editorial Photo Series', 'category' => 'Photography', 'description' => 'Seri foto editorial dengan fokus pada komposisi dan tone warna.', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Contact::query()->create([
            'email' => 'zahra@example.com',
            'phone' => '+62 812-3456-7890',
            'instagram' => '@zahranurizza',
            'github' => 'github.com/zahranurizza',
            'location' => 'Surabaya, Indonesia',
        ]);
    }
}
