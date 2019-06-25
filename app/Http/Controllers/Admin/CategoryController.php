<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{
    public function Index()
    {
    	$categories = Category::paginate(5);

    	return view('admin.categories.index')->with(compact('categories'));
    }

    public function Create()
  	{
  		$categories = Category::orderBy('name', 'asc')->get();
  		return view('admin.categories.create')->with(compact('categories'));
  	}

  	public function show($id)
		{
			$category = Category::where('id', $id)->get();
		  return view('admin.categories.show', compact('category'));
		}

  	public function store(request $request) 
	  {
	    $messages = [
	      'name.required' => 'Ingresá el nombre de la categoria.',
	      'name.max' => 'El campo nombre no puede exceder los 100 caracteres.',
	      'description.required' => 'Ingresá la descripción de la categoria.',
	      'description.numeric' => 'El campo descripción no puede exceder los 1000 caracteres.'
	    ];

	    $rules =[
	      'name' => 'required|max:100',
	      'description' => 'required|max:1000'
	    ];

	    $this->validate($request, $rules, $messages);

	    $category = new Category();
	    $category->name = $request->input('name');
	    $category->description = $request->input('description');
	    $category->slug = str_slug($request->input('name'), '-');

	    $category->save(); // Ejecuta un insert y agrega la categoria.

	    $message = 'Categoria cargada exitosamente';
	    return back()->with(compact('message'));
	      
	  }

	  public function edit($id) 
	  {
	    $category = Category::find($id);
	    return view('admin.categories.edit')->with(compact('category')); // ver formulario de Edicion
	  }

	  public function update(request $request, $id) 
	  {
	  	$category = Category::find($id);

	    $messages = [
	      'name.required' => 'Ingresá el nombre de la categoria.',
	      'name.max' => 'El campo nombre no puede exceder los 100 caracteres.',
	      'description.required' => 'Ingresá la descripción de la categoria.',
	      'description.numeric' => 'El campo descripción no puede exceder los 1000 caracteres.'
	    ];

	    $rules =[
	      'name' => 'required|max:100',
	      'description' => 'required|max:1000'
	    ];

	    $this->validate($request, $rules, $messages);

	    $category->name = $request->input('name');
	    $category->description = $request->input('description');
	    $category->slug = str_slug($request->input('name'), '-');

	    $category->save(); // Ejecuta un update y edita la categoria.

	    $message = 'Categoria editada exitosamente';

	    return back()->with(compact('message'));

	  }

	  public function delete($id, Request $request)
	  {
	    $category = Category::find($id);

	    $productsInCategory = $category->products->count();

    	if ($productsInCategory > 0 ) {
    		return view('admin.categories.index');
    	}

	    if ($request->ajax()) {

	     	Category::find($id)->delete();
	    	$message = 'La Categoria <strong> '. $category->name .' </strong>fue borrada.';
	    	return $message;
	    }
	  }


}
