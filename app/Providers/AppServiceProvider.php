<?php

namespace App\Providers;

use App\Models\ProductCategories;
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
        view()->composer('*', function ($view) {
            $navProductCategories = ProductCategories::where('status', 1)->orderBy('display_order', 'ASC')->get();
            view()->share('navProductCategories', $navProductCategories);


        });
    }
}
