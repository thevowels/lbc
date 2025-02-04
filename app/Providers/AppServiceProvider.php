<?php

namespace App\Providers;

use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\View\Components\Alert;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(EnsureTokenIsValid::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
        Route::pattern('id', '[0-9]+');
        Route::model('atoz', User::class);
        Blade::component('alert', Alert::class);
    }
}
