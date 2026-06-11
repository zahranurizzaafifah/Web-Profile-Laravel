<?php

namespace App\Http\Controllers;

use App\Services\ContactService;
use App\Services\PortfolioService;
use App\Services\ProfileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ProfileController extends Controller
{
    public function __construct(
        private ProfileService $profileService,
        private PortfolioService $portfolioService,
        private ContactService $contactService
    ) {}

    public function landing()
    {
        $profile = $this->profileService->getProfileData();
        $portfolios = $this->portfolioService->getPortfolioData(3);

        return view('landing', compact('profile', 'portfolios'));
    }

    public function about()
    {
        $profile = $this->profileService->getProfileData();

        return view('about', compact('profile'));
    }

    public function portfolio()
    {
        $portfolios = $this->portfolioService->getPortfolioData();

        return view('portfolio', compact('portfolios'));
    }

    public function contact()
    {
        $contact = $this->contactService->getContactData();

        return view('contact', compact('contact'));
    }

    public function sendContactEmail(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:3000'],
        ]);

        $contact = $this->contactService->getContactData();
        $recipient = $contact->email ?? null;

        if (! $recipient) {
            return back()
                ->withInput()
                ->with('contact_error', 'Email tujuan belum diatur oleh admin.');
        }

        $subject = $data['subject'] ?: 'Pesan baru dari website profile';
        $body = implode("\n", [
            'Pesan baru dari halaman kontak website.',
            '',
            'Nama: ' . $data['name'],
            'Email: ' . $data['email'],
            'Subjek: ' . $subject,
            '',
            'Pesan:',
            $data['message'],
        ]);

        try {
            Mail::raw($body, function ($mail) use ($recipient, $data, $subject) {
                $mail->to($recipient)
                    ->replyTo($data['email'], $data['name'])
                    ->subject($subject);
            });
        } catch (Throwable) {
            return back()
                ->withInput()
                ->with('contact_error', 'Pesan belum bisa dikirim. Cek konfigurasi email website.');
        }

        return back()->with('contact_success', 'Pesan berhasil dikirim. Terima kasih sudah menghubungi saya!');
    }
}
