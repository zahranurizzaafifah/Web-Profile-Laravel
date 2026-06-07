<?php

namespace App\Services;

use App\Models\Portfolio;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class PortfolioService
{
    public function getPortfolioData(?int $limit = null)
    {
        $fallback = collect([
            (object) ['title' => 'Brand Visual Identity', 'category' => 'Design', 'description' => 'Perancangan identitas visual dan template media sosial untuk kebutuhan kampus.', 'image_url' => null, 'project_url' => null],
            (object) ['title' => 'Cinematic Short Reel', 'category' => 'Video', 'description' => 'Editing short reel dengan pacing dinamis untuk promosi acara.', 'image_url' => null, 'project_url' => null],
            (object) ['title' => 'Editorial Photo Series', 'category' => 'Photography', 'description' => 'Seri foto editorial dengan fokus pada komposisi dan tone warna.', 'image_url' => null, 'project_url' => null],
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

        // Handle file upload
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $data['image_url'] = $this->storeImage($data['image']);
        }
        unset($data['image']);

        return Portfolio::query()->create($data);
    }

    public function updatePortfolio(Portfolio $portfolio, array $data)
    {
        // Handle file upload — replaces previous image
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            // Delete old uploaded file if exists (skip external URLs)
            if ($portfolio->image_url && str_starts_with($portfolio->image_url, '/storage/')) {
                $oldPath = str_replace('/storage/', 'public/', $portfolio->image_url);
                Storage::delete($oldPath);
            }
            $data['image_url'] = $this->storeImage($data['image']);
        }
        unset($data['image']);

        $portfolio->update($data);
        return $portfolio;
    }

    public function deletePortfolio(Portfolio $portfolio)
    {
        // Delete uploaded image file on delete
        if ($portfolio->image_url && str_starts_with($portfolio->image_url, '/storage/')) {
            $path = str_replace('/storage/', 'public/', $portfolio->image_url);
            Storage::delete($path);
        }
        $portfolio->delete();
    }

    private function storeImage(UploadedFile $file): string
    {
        $path = $file->store('portfolios', 'public');
        return '/storage/' . $path;
    }
}
