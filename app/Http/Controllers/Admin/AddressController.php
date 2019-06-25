<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\EditAddressRequest;
use App\Http\Requests\CreateAddressRequest;
use App\Http\Controllers\Controller;

use App\User;
use App\Address;

class AddressController extends Controller
{

	public function store(CreateAddressRequest $request, $user_id) 
  {

    $address = new Address();

    $address->user_id = $user_id;
    $address->street = $request->input('street');
    $address->number = $request->input('number');
    $address->departament = $request->input('departament');
    $address->floor = $request->input('floor');
    $address->locality = $request->input('locality');
    $address->cp = $request->input('cp');
    $address->state = $request->input('state');
    $address->country = $request->input('country');

    $address->save(); // Ejecuta un insert y graba la direccion del usuario.

    $message = 'Dirección editada exitosamente';

    return redirect('admin/users/'. $user_id .'/show')->with(compact('message'));

  }

	public function create($id_user)
  {
		$user = User::find($id_user);
		return view('admin.addresses.create', compact('user'));
  }

	public function edit($id) 
  {
    $address = Address::find($id);
    $user = $address->user;

    return view('admin.addresses.edit')->with(compact('address', 'user')); // ver formulario de Edicion
  }

  public function update(EditAddressRequest $request, $id)
  {
  	$address = Address::find($id);
    $address->street = $request->input('street');
    $address->number = $request->input('number');
    $address->departament = $request->input('departament');
    $address->floor = $request->input('floor');
    $address->locality = $request->input('locality');
    $address->cp = $request->input('cp');
    $address->state = $request->input('state');
    $address->country = $request->input('country');

    $address->save(); // Ejecuta un update y edita la direccion del usuario.

    $message = 'Dirección editada exitosamente';

    return redirect('admin/users/'. $address->user->id .'/show')->with(compact('message'));

  }

  public function delete($id, Request $request)
  {

    if ($request->ajax()) {
    
    	Address::find($id)->delete();
    	$message = 'La dirección fue borrada.';
    	return $message;
    }
  }

}
