@extends('admin.layout')

@section('title', 'Editar producto')

<!-- Header Admin -->
@section('header')
  @include('admin.includes.header')
@endsection
<!-- Header Admin end -->

<!-- Aside Admin -->
@section('aside')
  @include('admin.includes.aside')
@endsection
<!-- Aside Admin end -->

<!-- Content Admin -->
@section('content')
  <div class="container">
    
    <div class="row">
    	<div class="col-md-12 text-center">
        <h1>Editar Producto {{ $product->name }}</h1>
      </div>
    </div>

    <div class="row">
      @if (session('message'))
        <div id="message" class="col-md-12 alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-check"></i>
          {{ session('message') }}
        </div>
      @endif
    </div>

    <div class="row">
      <div class="col-md-12">
        @if ($errors->any())
          <div class="alert alert-danger small" role="alert">
            @foreach ($errors->all() as $error)
              <ul>
                <li>{{ $error }}</li>
              </ul>
            @endforeach
          </div>
        @endif
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary box-body">

           <form method="post" action="{{ url('/admin/products/'.$product->id.'/edit') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group row">
              <div class="col-md-6">
                <label for="name">Nombre</label>
                <input  type="text" class="form-control" name="name" id="name" placeholder="Nombre del producto" value="{{ old('name', $product->name) }}">
              </div>
              <div class="col-md-6">
                <label for="category">Categoría</label>
                <select  id="category" name="category" class="form-control">
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                      @if($product->category_id == $category->id )
                      selected
                      @endif
                      >{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="description">Descripción</label>
                <textarea id="description" name="description" class="form-control" rows="6" placeholder="Descripción del producto ...">{{ old('description', $product->description) }}</textarea>
              </div>
            </div>

            <div class="text-right">
              <a href="{{ url('admin/products/') }}" type="button" class="transition btn btn-info">
                <i class="fa fa-backward"></i>Volver
              </a>
              <button type="submit" class="transition btn btn-info">
                <i class="fa fa-save"></i>Guardar Cambios
              </button>
            </div>
            
          </form>

        </div>
      </div>
    </div>

  </div>
@endsection
<!-- Content Admin end -->

<!-- Footer Admin -->
@section('footer')
  @include('admin.includes.footer')
@endsection
<!-- Footer Admin end -->
