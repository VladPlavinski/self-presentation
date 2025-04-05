<?php

namespace App\Providers;

use App\Helpers\PersonalData;
use App\Facades\SvgHelper;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('svg', function () {
            return new SvgHelper();
        });
        $this->app->bind('personalData', function () {
            return new PersonalData();
        });
    }

    public function boot(): void
    {
        Vite::macro('company', fn (string $asset) => $this->asset("resources/images/companies/{$asset}"));
        Vite::macro('social', fn (string $asset) => $this->asset("resources/images/social/{$asset}"));
        Vite::macro('stack', fn (string $asset) => $this->asset("resources/images/stack/{$asset}"));
    }
}
