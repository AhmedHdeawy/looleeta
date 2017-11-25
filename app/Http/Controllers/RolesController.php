<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RolesController extends Controller
{
    //
    public function create($name, $display_name, $description)
    {
    	# code...
    	$role = new Role;
		$role->name         = $name;
		$role->display_name = $display_name; // optional
		$role->description  = $description; // optional
		$role->save();
    }
}
