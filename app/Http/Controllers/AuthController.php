<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User;

class AuthController extends Controller
{
    

    /**
    *   Login using Jax
    */
    public function login(Request $request)
    {
        # code...
        if($request->ajax())
        {
            $email = $request->email;
            $password = $request->password;
            $remember = $request->remember == "on" ? true : false;

            if(Auth::attempt(['email' => $email, 'password' => $password], $remember))
            {
                return response()->json(['success' => 'Done', 'intended' => '/']);
            }

            return response()->json(['error' => 'Not Auth']);
        }
    }

    /**
    *   Register using Jax
    */
    public function register(Request $request)
    {
        # code...
        if($request->ajax())
        {
            $valid = $this->validator($request->all());

            if($valid->fails())
            {
                return response()->json(['errors' => $valid->errors()->all()]);                
            }
            
            $user = User::create($request->all());
            Auth::login($user);
            return response()->json(['success' => 'Done']);

        }
    }

     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:30',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'image'     =>  'image',
        ]);
    }

    /**
    *   LogOut
    */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }
}
