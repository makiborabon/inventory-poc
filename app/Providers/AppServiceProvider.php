<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Illuminate\Support\Facades\Schema;
=======
use Illuminate\Support\facades\schema;
>>>>>>> 52907bea17f47b2da6be460516e16dad61dd531b

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
        //schema::defaultStringLength(191);  
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }
}
