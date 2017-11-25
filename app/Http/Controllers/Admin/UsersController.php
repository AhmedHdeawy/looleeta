<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

use App\User;
use App\Models\Role;

class UsersController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user = User::find($id);
        // dd(auth()->user()->hasRole('admin'));
        $roles = Role::pluck('name', 'id');
        
        return view('admin.pages.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        // $user->attachRole($request->roles);
        $user->roles()->detach();
        $user->roles()->attach($request->roles);
        
        $users = User::paginate(10);
        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('users.index');
        // return abort('404');
    }

    public function search(Request $request)
    {
        $data = [
            'name'  =>  $request->name,
            'email' =>  $request->email
        ];

        $users = User::orderBy('id', 'desc');
        if($request->name) {

           $users->where('name', 'like', '%'.$request->name.'%');
        
        }
        if($request->email) {
            $users->where('email', 'like', '%'.$request->email.'%');
        }
        $users = $users->paginate(10);
        
        return view('admin.pages.users.index', compact('users', 'data'));

    }
}
