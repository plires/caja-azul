<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;

use App\Product;
use App\ProductImage;
use App\Category;

class ProductController extends Controller
{
	public function Index()
	{
		$products = Product::paginate(10);
		return view('admin.products.index')->with(compact('products'));
	}

	public function Create()
  {
  	$categories = Category::orderBy('name', 'asc')->get();
  	return view('admin.products.create')->with(compact('categories'));
  }

	public function show($id)
	{
		$product = Product::find($id);
    $images = ProductImage::where('product_id', $id)->get();
	  return view('admin/products.show', compact('product', 'images'));
	}

	public function store(CreateProductRequest $request) 
  {
    $product = new Product();
    $product->name = $request->input('name');
    $product->category_id = $request->input('category');
    $product->description = $request->input('description');

    $product->save(); // Ejecuta un insert y agrega el usuario.

    $message = 'Producto cargado exitosamente';
    return back()->with(compact('message'));
      
  }

  public function edit($id) 
  {
    $product = Product::find($id);
    $categories = Category::all();
    return view('admin.products.edit')->with(compact('product', 'categories')); // ver formulario de Edicion
  }

  public function update(CreateProductRequest $request, $id) 
  {
  	$product = Product::find($id);
    
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->category_id = $request->input('category');

    $product->save(); // Ejecuta un update y edita el producto.

    $message = 'Producto editado exitosamente';

    return back()->with(compact('message'));

  }

  public function delete($id, Request $request)
  {
    $product = Product::find($id);

    if ($request->ajax()) {
    	Product::find($id)->delete();
    	$message = 'El Producto <strong> '. $product->name .' </strong>fue borrado.';
    	return $message;
    }
  }

}
