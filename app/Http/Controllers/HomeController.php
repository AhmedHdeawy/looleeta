<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Category;
use App\Article;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'article']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        // dd(auth()->user()->name);
        
        

        return view('front.pages.home');
    }

    /**
    *   Show Article Page
    */
    public function article(Request $request)
    {
        return view('front.pages.article');
    }

    /**
    *   Show Profile Page
    */
    public function profile(Request $request)
    {
        return view('front.pages.profile');
    }

    /**
    *   Show ContactUs Page
    */
    public function contact(Request $request)
    {
        return view('front.pages.contact');
    }
}
