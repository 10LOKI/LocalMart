<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\ProductPolicy;
use App\Policies\ReviewPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
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
        $this->registerPolicies();
        $this->cleanupStaleViteHotFile();
    }

    private function registerPolicies(): void
    {
        Gate::policy(Product::class, ProductPolicy::class);
        Gate::policy(Category::class, CategoryPolicy::class);
        Gate::policy(Review::class, ReviewPolicy::class);
        Gate::policy(User::class, UserPolicy::class);
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
