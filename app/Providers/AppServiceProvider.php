<?php

namespace App\Providers;

use App\Models\Location;
use Illuminate\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
   
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Condizione che permette di passare a tutte le viste la categoria Locations
        // if (Schema::hasTable('locations')) {
        //     View::share('locations', Location::all());
        // }

        //I paginator servono per non far rompere il sistema di bootstrap nell'impaginazione degli articoli
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    } 
}
