@extends('admin.layout')

@section('title', 'Crear Nuevo Producto')

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
        <h1>Nuevo Producto</h1>
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

    <!-- Errors -->
    @include('admin.includes.errors')

    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary box-body">
        
          <form method="post" action="{{ url('/admin/products/') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group row">
              <div class="col-md-6">
                <label for="name">Nombre</label>
                <input  type="text" class="form-control" name="name" id="name" placeholder="Nombre del producto" value="{{ old('name') }}">
              </div>
              <div class="col-md-6">
                <label for="category">Categoría</label>
                <select  id="category" name="category" class="form-control">
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="description">Descripción</label>
                <textarea id="description" name="description" class="form-control" rows="3" placeholder="Descripción del producto ...">{{ old('description') }}</textarea>
              </div>
            </div>

            <div class="text-right">
              <a href="{{ url('admin/products/') }}" type="button" class="transition btn btn-info">
                <i class="fa fa-backward"></i>Volver
              </a>
              <button type="submit" class="transition btn btn-info">
                <i class="fa fa-save"></i>Registrar Producto
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
