<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

final class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (! app()->runningInConsole()) {
            $settings = Setting::query()->pluck('value', 'key')->all();
            view()->share([
                'settings' => $settings,
            ]);
        }
    }
}
