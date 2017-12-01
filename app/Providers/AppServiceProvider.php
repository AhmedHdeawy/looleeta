<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;
use App\Category;
use App\Article;

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

        $mostPopular = Article::withCount('comments')->orderBy('comments_count', 'desc')->take(5)->get();

        view()->share(compact('urlSegments', 'categories', 'categoriesModal', 'mostPopular'));
        
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
