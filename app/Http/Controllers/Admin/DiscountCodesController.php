<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCuponDiscountRequest;
use Carbon\Carbon;


use App\DiscountCode;

class DiscountCodesController extends Controller
{
  public function Index()
  {
  	$discountsCodes = DiscountCode::orderBy('id', 'asc')->paginate(5);

  	return view('admin.discount_codes.index')->with(compact('discountsCodes'));
  }

  public function Create()
	{
		return view('admin.discount_codes.create');
	}

	public function store(CreateCuponDiscountRequest $request) 
  {
    // Obtengo Dias, mes y año del input start_date
    $startDateInput = explode( '-', $request->input('start_date'));
    // creo un objeto Carbon a partir del $request->input('start_date') para guardar en BDD el formato 'yyyy-mm-dd'
    $startDate = Carbon::createFromDate($startDateInput[2], $startDateInput[1], $startDateInput[0] );

    // Obtengo Dias, mes y año del input start_date
    $endDateInput = explode( '-', $request->input('end_date'));
    // creo un objeto Carbon a partir del $request->input('start_date') para guardar en BDD el formato 'yyyy-mm-dd'
    $endDate = Carbon::createFromDate($endDateInput[2], $endDateInput[1], $endDateInput[0] );

    $discountsCodes = new DiscountCode();
    $discountsCodes->name = $request->input('name');
    $discountsCodes->description = $request->input('description');
    $discountsCodes->start_date = $startDate;
    $discountsCodes->end_date = $endDate;
    $discountsCodes->discount = $request->input('discount');

    $discountsCodes->save(); // Ejecuta un insert y agrega el cupon.

    $message = 'Cupon de descuento cargado exitosamente';
    return back()->with(compact('message'));
      
  }

  public function edit($id) 
  {
    $discountCode = DiscountCode::find($id);
    return view('admin.discount_codes.edit')->with(compact('discountCode')); // ver formulario de Edicion
  }

  public function update(CreateCuponDiscountRequest $request, $id) 
  {

    // Obtengo Dias, mes y año del input start_date
    $startDateInput = explode( '-', $request->input('start_date'));
    // creo un objeto Carbon a partir del $request->input('start_date') para guardar en BDD el formato 'yyyy-mm-dd'
    $startDate = Carbon::createFromDate($startDateInput[2], $startDateInput[1], $startDateInput[0] );

    // Obtengo Dias, mes y año del input start_date
    $endDateInput = explode( '-', $request->input('end_date'));
    // creo un objeto Carbon a partir del $request->input('start_date') para guardar en BDD el formato 'yyyy-mm-dd'
    $endDate = Carbon::createFromDate($endDateInput[2], $endDateInput[1], $endDateInput[0] );


    $discountCode = DiscountCode::find($id);

    $discountCode->name = $request->input('name');
    $discountCode->description = $request->input('description');
    $discountCode->start_date = $startDate;
    $discountCode->end_date = $endDate;
    $discountCode->discount = $request->input('discount');

    $discountCode->save(); // Ejecuta un update y edita el cupon.

    $message = 'Cupon editado exitosamente';
    return back()->with(compact('message'));
      
  }

  public function delete($id, Request $request)
  {
    $discountCode = DiscountCode::find($id);

    if ($request->ajax()) {
      Product::find($id)->delete();
      $message = 'El Producto <strong> '. $product->name .' </strong>fue borrado.';
      return $message;
    }
    
  }


}
