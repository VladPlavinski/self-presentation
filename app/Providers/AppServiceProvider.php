<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;

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
        Vite::macro('company', fn (string $asset) => $this->asset("resources/images/companies/{$asset}"));
        Vite::macro('social', fn (string $asset) => $this->asset("resources/images/social/{$asset}"));
        Vite::macro('stack', fn (string $asset) => $this->asset("resources/images/stack/{$asset}"));
    }
}
