<?php

namespace App\Providers;

use App\Facades\SvgHelper;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('svg', function () {
            return new SvgHelper();
        });
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
