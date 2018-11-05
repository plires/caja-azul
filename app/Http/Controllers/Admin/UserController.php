<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function Index()
    {

    	$users = User::paginate(10);

    	return view('admin.users.index')->with(compact('users'));
    }
}
