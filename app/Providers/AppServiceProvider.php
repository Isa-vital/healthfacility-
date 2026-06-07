<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Throwable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.app', function ($view) {
            $links = collect();

            try {
                $links = SiteSetting::group('social')->filter(fn ($s) => filled($s->value));
            } catch (Throwable $e) {
                // Table may not exist yet (e.g., during initial migration). Fail silently.
            }

            $view->with('socialLinks', $links);
        });
    }
}
