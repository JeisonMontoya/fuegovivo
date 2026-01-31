<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        \Filament\Support\Facades\FilamentView::registerRenderHook(
            \Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_AFTER,
            fn(): string => '<div class="flex justify-center mt-4">
                <a href="/" class="text-sm text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white underline">
                    &larr; Volver al inicio
                </a>
            </div>',
        );
    }
}
