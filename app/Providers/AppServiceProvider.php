<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
<<<<<<< HEAD
use Illuminate\Support\Facades\URL;

=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< HEAD
         
        Schema::defaultStringLength(191); 
       
=======
        Schema::defaultStringLength(191);

>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
<<<<<<< HEAD
        //
            
=======
        //        
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

    }
}
