<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\HomeComposer;
use Illuminate\Support\Facades\View;


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
        View::composer(['components.footer2','components.menuList2','components.menuList4','components.mobileMenu','front.fixe', 'front.index', 'front.shop.index'], HomeComposer::class);
        setlocale(LC_TIME, config('app.locale'));

    }
}
