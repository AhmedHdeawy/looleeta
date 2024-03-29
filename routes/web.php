<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index')->name('home');

Route::get('/article/{articles_slug}', 'HomeController@article')->name('article');
Route::get('searchArticle', 'HomeController@searchArticle')->name('searchArticle');
Route::get('/like', 'HomeController@like')->name('like');


Route::get('/category/{categories_slug}', 'HomeController@category')->name('category');

Route::get('/profile', 'HomeController@profile')->name('profile');

Route::get('/contact', 'HomeController@contact')->name('contact');

Route::post('/login', 'AuthController@login')->name('login');
Route::post('/register', 'AuthController@register')->name('register');
Route::get('logout', 'AuthController@logout')->name('logout');


// Auth routes
Route::group(['middleware' => 'auth'], function() {
    // new comment
    Route::post('addComment', 'HomeController@addComment')->name('addComment');
    Route::post('editComment', 'HomeController@editComment')->name('editComment');
    Route::post('deleteComment', 'HomeController@deleteComment')->name('deleteComment');

    Route::get('addArticle', 'HomeController@addArticle')->name('addArticle');
    Route::get('editArticle/{id}', 'HomeController@editArticle')->name('editArticle');
    Route::post('storeArticle', 'HomeController@storeArticle')->name('storeArticle');
    Route::post('updateArticle/{id}', 'HomeController@updateArticle')->name('updateArticle');
    Route::get('deleteArticle/{id}', 'HomeController@deleteArticle')->name('deleteArticle');
});

// Dashboard routes
Route::group(['prefix' => 'dashboard', 'middleware' => ['admin', 'role:admin|editor'] ], function() {
    
    // Home
    Route::get('/', ['as' => 'dashboard.index', 'uses' => 'Admin\DashboardController@index'] );

    // Users
    Route::resource('users', 'Admin\UsersController');
    Route::get('usersSearch', ['as' => 'users.search', 'uses' => 'Admin\UsersController@search']);

    // Categories
    Route::resource('/categories', 'Admin\CategoriesController' );
    Route::get('categoriesSearch', ['as' => 'categories.search', 'uses' => 'Admin\CategoriesController@search']);

    // Articles
    Route::resource('/articles', 'Admin\ArticlesController' );
    Route::get('articlesSearch', ['as' => 'articles.search', 'uses' => 'Admin\ArticlesController@search']);


    // Ads
    Route::resource('/ads', 'Admin\AdsController' );

    // Settings
    Route::resource('/settings', 'Admin\SettingsController' );

});


Route::get('test', 'TestController@index');

// Auth::routes();


