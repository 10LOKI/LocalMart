<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->cleanupStaleViteHotFile();
    }

    private function cleanupStaleViteHotFile(): void
    {
        if (! app()->environment('local')) {
            return;
        }

        $hotFile = public_path('hot');
        if (! File::exists($hotFile)) {
            return;
        }

        $baseUrl = trim((string) File::get($hotFile));
        if ($baseUrl === '') {
            return;
        }

        $probeUrl = rtrim($baseUrl, '/') . '/@vite/client';

        try {
            $response = Http::timeout(0.2)->get($probeUrl);
            if ($response->successful()) {
                return;
            }
        } catch (\Throwable $e) {
            // Fall through and remove the stale hot file.
        }

        File::delete($hotFile);
    }
}
