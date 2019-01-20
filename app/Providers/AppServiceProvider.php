<?php

namespace App\Providers;

use App\Comment;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
//
//        view()->composer('Admin.section.master' , function($view) {
//            $unsuccessful = Comment::where('approved' , 0)->count();
//            $view->with(compact('unsuccessful'));
//        });
//        view()->composer('Admin.section.master' , function($view) {
//            $successful = Comment::where('approved' , 1)->count();
//            $view->with(compact('successful'));
//        });
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
