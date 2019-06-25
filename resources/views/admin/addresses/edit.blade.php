@extends('admin.layout')

@section('title', 'Editar usuario')

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
        <h1>Editar Direccion del usuario <strong>{{ $user->name. ' ' . $user->last_name }}</strong></h1>
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

          <form method="post" action="{{ url('admin/users/'. $address->id .'/address/edit/') }}">
            @method('PATCH')
            {{ csrf_field() }}

            <div class="form-group row">
              <div class="col-md-6">
                <label for="street">Calle</label>
                <input type="text" class="form-control" name="street" id="street" placeholder="Calle" value="{{ old('street', $address->street) }}">
              </div>
              <div class="col-md-6">
                <label for="number">Número</label>
                <input type="text" class="form-control" name="number" id="number" placeholder="Número" value="{{ old('number', $address->number) }}">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-4">
                <label for="departament">Departamento</label>
                <input type="text" class="form-control" name="departament" id="departament" placeholder="Departamento" value="{{ old('departament', $address->departament) }}">
              </div>
              <div class="col-md-4">
                <label for="floor">Piso</label>
                <input type="text" class="form-control" name="floor" id="floor" placeholder="Piso" value="{{ old('floor', $address->floor) }}">
              </div>
              <div class="col-md-4">
                <label for="cp">C.P.</label>
                <input type="text" class="form-control" name="cp" id="cp" placeholder="C.P." value="{{ old('cp', $address->cp) }}">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-4">
                <label for="locality">Localidad</label>
                <input type="text" class="form-control" name="locality" id="locality" placeholder="Localidad" value="{{ old('locality', $address->locality) }}">
              </div>
              <div class="col-md-4">
                <label for="state">Provincia</label>
                <input type="text" class="form-control" name="state" id="state" placeholder="Provincia" value="{{ old('state', $address->state) }}">
              </div>
              <div class="col-md-4">
                <label for="country">País</label>
                <input type="text" class="form-control" name="country" id="country" placeholder="País" value="{{ old('country', $address->country) }}">
              </div>
            </div>

            <div class="text-right">
              <a href="{{ url('admin/users/') }}" type="button" class="transition btn btn-info">
                <i class="fa fa-backward"></i>Volver a Usuarios
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
