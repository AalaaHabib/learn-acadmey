<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Setting;
use App\Sitecontent;

class viewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('user.includes.header' , function($view){
            $view->with('categories' , Category::get());
            $view->with('setting' , Setting::first());
        });

        view()->composer('user.includes.footer' , function($view){
            $view->with('categories' , Category::get());
            $view->with('setting' , Setting::first());
            $view->with('footer' , Sitecontent::where('name' , 'footer')->first());

        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
