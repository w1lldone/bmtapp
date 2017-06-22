<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Schema::defaultStringLength(191);

        view()->composer(['layouts.nav','layouts.sidenav'], function($view){
            $view->with('orders', \App\Order::where('status', 'confirmed')->orwhere('status', 'delivered')->orderBy('updated_at', 'desc')->take(5)->get());
            $view->with('layanans', \App\Layanan::where('status', 'pending')->orderBy('updated_at', 'desc')->take(5)->get());
            $view->with('count', \App\Order::actCount());
            $view->with('count_l', \App\Layanan::where('status', 'pending')->count());
            $view->with('user', Auth::user());
        });

        Carbon::setLocale('id');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
