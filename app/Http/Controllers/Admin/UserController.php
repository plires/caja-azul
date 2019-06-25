<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Address;
use App\Role;
use App\User;
use App\Subscription;


class UserController extends Controller
{

	function __construct()
	{
		$this->middleware('roles');
	}

  public function Index()
  {

  	$users = User::paginate(10);

  	return view('admin.users.index')->with(compact('users'));
  }

  public function Create()
  {
    $roles = Role::orderBy('id', 'desc')->get();
  	return view('admin.users.create', compact('roles'));
  }

	public function show($id)
	{
		$user = User::find($id);
		$addresses = Address::where('user_id', $id)->get();
		$subscriptions = Subscription::where('user_id', $id)->get();

	  return view('admin/users.show', compact('user', 'addresses', 'subscriptions'));
	}

  public function store(CreateUserRequest $request) 
  {
    $user = new User();

    $user->name = $request->input('name');
    $user->last_name = $request->input('last_name');
    $user->phone = $request->input('phone');
    $user->email = $request->input('email');
    $user->role_id = $request->input('role');
    $user->password = bcrypt($request->input('password'));

    $user->save(); // Ejecuta un insert y agrega el usuario.

    $message = 'Usuario registrado exitosamente';
    return back()->with(compact('message'));
      
  }

  public function edit($id) 
  {

    $roles = Role::orderBy('id', 'desc')->get();
    $user = User::find($id);

    return view('admin.users.edit')->with(compact('user', 'roles')); // ver formulario de Edicion
  }

  public function update(EditUserRequest $request, $id) 
  {

  	$user = User::find($id);

    $user->name = $request->input('name');
    $user->last_name = $request->input('last_name');
    $user->phone = $request->input('phone');
    $user->email = $request->input('email');
    $user->role_id = $request->input('role');

    if ($request->input('password')){
    	$user->password = bcrypt($request->input('password'));
    }

    $user->save(); // Ejecuta un update y edita el usuario.

    $message = 'Usuario editado exitosamente';

    return back()->with(compact('message'));

  }

  public function delete($id, Request $request)
  {
    $user = User::find($id);
    $userAuthId = Auth::id();
  	
    if ($userAuthId == $id) {
  		return view('admin.users.index');
    }

    if ($request->ajax()) {
    
    	User::find($id)->delete();
    	$message = 'El Usuario<strong> '. $user->name .' </strong>fue borrado.';
    	return $message;
    }
  }

  public function dataConvertJson()
  {
    $users = User::pluck('name');

    return $users;
  }

}
