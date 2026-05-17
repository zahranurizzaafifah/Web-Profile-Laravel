<?php

namespace App\Services;

use App\Models\Portfolio;
use Illuminate\Support\Facades\Schema;

class PortfolioService
{
    public function getPortfolioData(int $limit = null)
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

    public function createPortfolio(array $data)
    {
        $user = \App\Models\User::query()->first();
        if ($user) {
            $data['user_id'] = $user->id;
        }

        return Portfolio::query()->create($data);
    }

    public function updatePortfolio(Portfolio $portfolio, array $data)
    {
        $portfolio->update($data);
        return $portfolio;
    }

    public function deletePortfolio(Portfolio $portfolio)
    {
        $portfolio->delete();
    }
}
