<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $urlSegments = Request::segment(2);

        $categories = Category::where('parents_id', null)
                              ->orderBy('categories_id', 'desc')->limit(5)->get();

        $categoriesModal = Category::where('parents_id', null)->get();

        view()->share(compact('urlSegments', 'categories', 'categoriesModal'));
        
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
