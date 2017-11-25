<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Role;
use App\Models\Permission;

class TestController extends Controller
{
    //
    public function index(Request $request)
    {
    	dd($request->user() ? "User" : 'Not');
		// $admin = new Role;
		// $admin->name         = 'admin';
		// $admin->display_name = 'User Administrator'; // optional
		// $admin->description  = 'User is allowed to manage and edit other users'; // optional
		// $admin->save();
		
    	$admin = Role::where('name', '=', 'admin')->first();
		$user = User::where('email', 'ahmedhdeawy@gmail.com')->first();

    	dd(auth()->user()->hasRole('admin'));

    	$createPost = new Permission();
		$createPost->name         = 'create-post';
		$createPost->display_name = 'Create Posts'; // optional
		// Allow a user to...
		$createPost->description  = 'create new blog posts'; // optional
		$createPost->save();

		$editPost = new Permission();
		$editPost->name         = 'edit-post';
		$editPost->display_name = 'Edit post'; // optional
		// Allow a user to...
		$editPost->description  = 'edit existing posts'; // optional
		$editPost->save();


		$deletePost = new Permission();
		$deletePost->name = 'delete-post';
		$deletePost->display_name = 'Delete Post';
		$deletePost->description = 'Delete Existing Posts';
		$deletePost->save();


		$admin->attachPermissions([$createPost, $editPost, $deletePost]);

		dd("Done");



    }
}
