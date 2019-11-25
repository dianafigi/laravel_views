<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Illuminate\Support\Facades\Blade; //acrescentei esta classe

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      //Blade::component('componentes.alerta', 'alerta');
      //acrescentar esta classe la em cima
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
