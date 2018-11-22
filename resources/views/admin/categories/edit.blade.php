@extends('admin.layout')

@section('title', 'Editar categoria')

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
        <h1>Editar Categoria {{ $category->name }}</h1>
      </div>
    </div>

    <div class="row">
      @if (session('message'))
        <div id="message" class="col-md-8 col-md-offset-2 alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-check"></i>
          {{ session('message') }}
        </div>
      @endif
    </div>

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
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
      <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary box-body">
        
          <form method="post" action="{{ url('/admin/categories/' . $category->id .'/edit') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group row">
              <div class="col-md-12">
                <label for="name">Nombre</label>
                <input  type="text" class="form-control" name="name" id="name" placeholder="Nombre de la categoria" value="{{ old('name', $category->name) }}">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="description">Descripción</label>
                <textarea id="description" name="description" class="form-control" rows="5" placeholder="Descripción de la categoria...">{{ old('description', $category->description) }}</textarea>
              </div>
            </div>

            <div class="text-right">
              <a href="{{ url('admin/categories/') }}" type="button" class="transition btn btn-info">
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