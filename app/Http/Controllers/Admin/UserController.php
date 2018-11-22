<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Address;
use App\User;
use App\Subscription;

class UserController extends Controller
{
    public function Index()
    {

    	$users = User::paginate(10);

    	return view('admin.users.index')->with(compact('users'));
    }

    public function Create()
    {
    	return view('admin.users.create');
    }

		public function show($id)
		{
			$user = User::find($id);
			$addresses = Address::where('user_id', $id)->get();
			$subscriptions = Subscription::where('user_id', $id)->get();

		  return view('admin/users.show', compact('user', 'addresses', 'subscriptions'));
		}

    public function store(request $request) 
	  {

	    $messages = [
	      'name.required' => 'Ingresá tu nombre.',
	      'name.max' => 'El campo nombre no puede exceder los 100 caracteres.',
	      'last_name.required' => 'Ingresá tu apellido.',
	      'last_name.max' => 'El campo nombre no puede exceder los 100 caracteres.',
	      'phone.required' => 'Ingresá un teléfono.',
	      'phone.min' => 'No se admiten valores negativos para el campo teléfono (-11...).',
	      'email.required' => 'Ingresá un email.',
	      'email.email' => 'Ingrese un email válido.',
	      'email.unique' => 'El email ya se encuentra registrado. Cámbielo por otro.',
	      'email.max' => 'El campo email no puede exceder los 100 caracteres.',
	      'password.required' => 'Ingresá un password.',
	      'password.max' => 'El campo password no puede exceder los 16 caracteres.',
	      'password.min' => 'El campo password debe tener al menos 6 caracteres.'
	    ];

	    $rules =[
	      'name' => 'required|max:100',
	      'last_name' => 'required|max:100',
	      'phone' => 'required|min:0',
	      'email' => 'required|email|max:100|unique:users',
	      'password' => 'required|max:16|min:6'
	    ];

	    $this->validate($request, $rules, $messages);

	    $user = new User();
	    $user->name = $request->input('name');
	    $user->last_name = $request->input('last_name');
	    $user->phone = $request->input('phone');
	    $user->email = $request->input('email');
	    $user->type = $request->input('type');
	    $user->password = $request->input('password');

	    $user->save(); // Ejecuta un insert y agrega el usuario.

	    $message = 'Usuario registrado exitosamente';
	    return back()->with(compact('message'));
	      
	  }

	  public function edit($id) 
	  {

	    $user = User::find($id);

	    return view('admin.users.edit')->with(compact('user')); // ver formulario de Edicion
	  }

	  public function update(request $request, $id) 
	  {
	  	$user = User::find($id);

	    $messages = [
	      'name.required' => 'Ingresá tu nombre.',
	      'name.max' => 'El campo nombre no puede exceder los 100 caracteres.',
	      'last_name.required' => 'Ingresá tu apellido.',
	      'last_name.max' => 'El campo nombre no puede exceder los 100 caracteres.',
	      'phone.required' => 'Ingresá un teléfono.',
	      'phone.min' => 'No se admiten valores negativos para el campo teléfono (-11...).',
	      'email.required' => 'Ingresá un email.',
	      'email.email' => 'Ingrese un email válido.',
	      'email.max' => 'El campo email no puede exceder los 100 caracteres.'
	    ];

	    $rules =[
	      'name' => 'required|max:100',
	      'last_name' => 'required|max:100',
	      'phone' => 'required|min:0',
	      'email' => 'required|email|max:100'
	    ];

	    $this->validate($request, $rules, $messages);

	    $user->name = $request->input('name');
	    $user->last_name = $request->input('last_name');
	    $user->phone = $request->input('phone');
	    $user->email = $request->input('email');
	    $user->type = $request->input('type');

	    $user->save(); // Ejecuta un update y edita el usuario.

	    $message = 'Usuario editado exitosamente';

	    return back()->with(compact('message'));

	  }

	  public function delete($id, Request $request)
	  {
	    $user = User::find($id);
	    $userAuthId = Auth::id();

	    if ($request->ajax()) {

	    	if ($userAuthId == $id) {
	    		$data = [
					    'error'  => 'Raphael',
					    'red'   => 22
					];
	    		// session()->flash('red', 'red!');

			    return $data;
	    }
	    
	    	User::find($id)->delete();
	    	$message = 'El Usuario<strong> '. $user->name .' </strong>fue borrado.';
	    	return $message;
	    }
    }

}
