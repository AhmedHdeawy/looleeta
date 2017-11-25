<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    //protected $loginPath = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login(Request $request)
    {
        # code...
        if($request->ajax())
        {
            $email = $request->email;
            $password = $request->password;

            if(Auth::attempt(['email' => $email, 'password' => $password]))
            {
                return response()->json(['success' => 'Done', 'intended' => '/']);
            }

            return response()->json(['error' => 'Not Auth']);
        }
    }
}
