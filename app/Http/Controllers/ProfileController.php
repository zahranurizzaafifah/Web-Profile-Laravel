<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Profile;
use Illuminate\Support\Facades\Schema;

class ProfileController extends Controller
{
    public function landing()
    {
        $profile = $this->profileData();
        $portfolios = $this->portfolioData(3);

        return view('landing', compact('profile', 'portfolios'));
    }

    public function about()
    {
        $profile = $this->profileData();

        return view('about', compact('profile'));
    }

    public function portfolio()
    {
        $portfolios = $this->portfolioData();

        return view('portfolio', compact('portfolios'));
    }

    public function contact()
    {
        $contact = $this->contactData();

        return view('contact', compact('contact'));
    }

    private function profileData(): object
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

    private function portfolioData(int $limit = null)
    {
        $fallback = collect([
            (object) ['title' => 'Brand Visual Identity', 'category' => 'Design', 'description' => 'Perancangan identitas visual dan template media sosial untuk kebutuhan kampus.', 'project_url' => null],
            (object) ['title' => 'Cinematic Short Reel', 'category' => 'Video', 'description' => 'Editing short reel dengan pacing dinamis untuk promosi acara.', 'project_url' => null],
            (object) ['title' => 'Editorial Photo Series', 'category' => 'Photography', 'description' => 'Seri foto editorial dengan fokus pada komposisi dan tone warna.', 'project_url' => null],
        ]);

        if (! Schema::hasTable('portfolios')) {
            return is_int($limit) ? $fallback->take($limit)->values() : $fallback;
        }

        $query = Portfolio::query()->latest();

        return is_int($limit) ? $query->take($limit)->get() : $query->get();
    }

    private function contactData(): object
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
}
