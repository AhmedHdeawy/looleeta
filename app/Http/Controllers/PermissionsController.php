<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionsController extends Controller
{
     //
    public function create($name, $display_name, $description)
    {
    	# code...
    	$permission = new Permission;
		$permission->name         = $name;
		$permission->display_name = $display_name; // optional
		$permission->description  = $description; // optional
		$permission->save();
    }
}
