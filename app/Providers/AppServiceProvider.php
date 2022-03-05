<?php

namespace App\Providers;

use App\Models\Cake;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cakes = Cake::where('category', 'best-selling');
        View::share('cakes', $cakes);
    }
}
