<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Address;
use App\User;

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

    public function store(request $request) 
	  {

	    $messages = [
	      'name.required' => 'Ingresá tu nombre.',
	      'name.max' => 'El campo nombre no puede exceder los 100 caracteres.',
	      'last_name.required' => 'Ingresá tu apellido.',
	      'last_name.max' => 'El campo nombre no puede exceder los 100 caracteres.',
	      'phone.required' => 'Ingresá un teléfono.',
	      'phone.numeric' => 'Ingrese un valor numerico para el campo teléfono (11 5 054 8421).',
	      'phone.min' => 'No se admiten valores negativos para el campo teléfono (-11...).',
	      'email.required' => 'Ingresá un email.',
	      'email.email' => 'Ingrese un email válido.',
	      'email.unique' => 'El email ya se encuentra registrado. Cámbielo por otro.',
	      'email.max' => 'El campo email no puede exceder los 100 caracteres.',
	      'password.required' => 'Ingresá un password.',
	      'password.max' => 'El campo password no puede exceder los 16 caracteres.',
	      'password.min' => 'El campo password debe tener al menos 6 caracteres.',
	      'street.required' => 'Ingresá una calle.',
	      'street.max' => 'El campo calle no puede exceder los 100 caracteres.',
	      'number.required' => 'Ingresá el número de calle.',
	      'number.max' => 'El campo número no puede exceder los 10 caracteres.',
	      'locality.required' => 'Ingresá una localidad.',
	      'locality.max' => 'El campo localidad no puede exceder los 100 caracteres.',
	      'state.required' => 'Ingresá una provincia.',
	      'state.max' => 'El campo provincia no puede exceder los 100 caracteres.',
	      'country.required' => 'Ingresá el país.',
	      'country.max' => 'El campo país no puede exceder los 100 caracteres.',
	    ];

	    $rules =[
	      'name' => 'required|max:100',
	      'last_name' => 'required|max:100',
	      'phone' => 'required|numeric|min:0',
	      'email' => 'required|email|max:100|unique:users',
	      'password' => 'required|max:16|min:6',
	      'street' => 'required|max:100',
	      'number' => 'required|max:10',
	      'locality' => 'required|max:100',
	      'state' => 'required|max:100',
	      'country' => 'required|max:100'
	    ];

	    $this->validate($request, $rules, $messages);

	    $address = new Address();
	    $address->street = $request->input('street');
	    $address->number = $request->input('number');
	    $address->departament = $request->input('departament');
	    $address->floor = $request->input('floor');
	    $address->locality = $request->input('locality');
	    $address->cp = $request->input('cp');
	    $address->state = $request->input('state');
	    $address->country = $request->input('country');

	    $address->save(); // Ejecuta un insert y agrega la direccion del usuario.

	    $address= Address::all();

	    // Obtengo el ultimo Id de Address para insertarlo al usuario
			$addressId =	$address->last()->id;

	    $user = new User();
	    $user->name = $request->input('name');
	    $user->last_name = $request->input('last_name');
	    $user->phone = $request->input('phone');
	    $user->email = $request->input('email');
	    $user->type = $request->input('type');
	    $user->address_id = $addressId;
	    $user->password = $request->input('password');

	    $user->save(); // Ejecuta un insert y agrega el usuario.

	    return redirect('/admin/users');
	      
	  }

	  public function edit($id) 
	  {

	    $user = User::find($id);
	    $address = $user->address;

	    return view('admin.users.edit')->with(compact('user', 'address')); // ver formulario de Edicion
	  }

	  public function update(request $request, $id) 
	  {
	  	$user = User::find($id);
	    $address = $user->address;

	    $messages = [
	      'name.required' => 'Ingresá tu nombre.',
	      'name.max' => 'El campo nombre no puede exceder los 100 caracteres.',
	      'last_name.required' => 'Ingresá tu apellido.',
	      'last_name.max' => 'El campo nombre no puede exceder los 100 caracteres.',
	      'phone.required' => 'Ingresá un teléfono.',
	      'phone.numeric' => 'Ingrese un valor numerico para el campo teléfono (11 5 054 8421).',
	      'phone.min' => 'No se admiten valores negativos para el campo teléfono (-11...).',
	      'email.required' => 'Ingresá un email.',
	      'email.email' => 'Ingrese un email válido.',
	      'email.max' => 'El campo email no puede exceder los 100 caracteres.',
	      'password.max' => 'El campo password no puede exceder los 16 caracteres.',
	      'password.min' => 'El campo password debe tener al menos 6 caracteres.',
	      'street.required' => 'Ingresá una calle.',
	      'street.max' => 'El campo calle no puede exceder los 100 caracteres.',
	      'number.required' => 'Ingresá el número de calle.',
	      'number.max' => 'El campo número no puede exceder los 10 caracteres.',
	      'locality.required' => 'Ingresá una localidad.',
	      'locality.max' => 'El campo localidad no puede exceder los 100 caracteres.',
	      'state.required' => 'Ingresá una provincia.',
	      'state.max' => 'El campo provincia no puede exceder los 100 caracteres.',
	      'country.required' => 'Ingresá el país.',
	      'country.max' => 'El campo país no puede exceder los 100 caracteres.',
	    ];

	    $rules =[
	      'name' => 'required|max:100',
	      'last_name' => 'required|max:100',
	      'phone' => 'required|numeric|min:0',
	      'email' => 'required|email|max:100',
	      'password' => 'max:16|min:6',
	      'street' => 'required|max:100',
	      'number' => 'required|max:10',
	      'locality' => 'required|max:100',
	      'state' => 'required|max:100',
	      'country' => 'required|max:100'
	    ];

	    $this->validate($request, $rules, $messages);

	    $address->street = $request->input('street');
	    $address->number = $request->input('number');
	    $address->departament = $request->input('departament');
	    $address->floor = $request->input('floor');
	    $address->locality = $request->input('locality');
	    $address->cp = $request->input('cp');
	    $address->state = $request->input('state');
	    $address->country = $request->input('country');

	    $address->save(); // Ejecuta un update y edita la direccion del usuario.

	    $user->name = $request->input('name');
	    $user->last_name = $request->input('last_name');
	    $user->phone = $request->input('phone');
	    $user->email = $request->input('email');
	    $user->type = $request->input('type');
	    $user->password = bcrypt($request->input('password'));

	    $user->save(); // Ejecuta un update y edita el usuario.

	    return redirect('/admin/users');
	  }

	  public function delete($id, Request $request)
	  {
	    $user = User::find($id);

	    $message = 'El Usuario <strong>' .$user->name. '</strong> fue borrado.';

	    User::find($id)->delete();

	    if ($request->ajax() ) {
	        return $message;
	    }
	  }
}
