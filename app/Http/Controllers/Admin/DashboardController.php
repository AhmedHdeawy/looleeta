<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use App\User;

class DashboardController extends Controller
{
    //
    public function index(Request $request)
    {
    	$usersCount = User::count();
    	$articlesCount = Article::count();
    	$categoriesCount = Category::count();

    	return view('admin.pages.dashboard', compact('usersCount', 'articlesCount', 'categoriesCount'));
    }
}
