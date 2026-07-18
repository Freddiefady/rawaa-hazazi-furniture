<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Override;

final class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    #[Override]
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
