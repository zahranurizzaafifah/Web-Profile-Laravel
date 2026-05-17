<?php

namespace App\Http\Controllers;

use App\Services\ContactService;
use App\Services\PortfolioService;
use App\Services\ProfileService;

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
}
