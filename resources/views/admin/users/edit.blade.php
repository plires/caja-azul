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
        <h1>Editar Usuario {{ $user->name }}</h1>
      </div>
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

        <form method="post" action="{{ url('/admin/users/'.$user->id.'/edit') }}" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="form-group row">
            <div class="col-md-6">
              <label for="name">Nombre</label>
              <input required type="text" class="form-control" name="name" id="name" placeholder="Juan" value="{{ old('name', $user->name) }}">
            </div>
            <div class="col-md-6">
              <label for="last_name">Apellido</label>
              <input required type="text" class="form-control" name="last_name" id="last_name" placeholder="Perez" value="{{ old('last_name', $user->last_name) }}">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label for="phone">Teléfono</label>
              <input required type="text" class="form-control" name="phone" id="phone" placeholder="115 052 5504" value="{{ old('phone', $user->phone) }}">
            </div>
            <div class="col-md-6">
              <label for="email">Email</label>
              <input required type="email" class="form-control" name="email" id="email" placeholder="juan@xxx.com" value="{{ old('email', $user->email) }}">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label for="type">Tipo de Usuario</label>
              <select id="type" name="type" class="form-control">
                <option value="Administrador" 
                  @if ($user->type == old('type', 'Administrador'))
                    selected
                  @endif>
                  Administrador
                </option>
                <option value="Usuario" 
                  @if ($user->type == old('type', 'Usuario'))
                    selected
                  @endif>
                  Usuario
                </option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Pass">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-3">
              <label for="street">Calle</label>
              <input required type="text" class="form-control" name="street" id="street" placeholder="ej: Rivadavia" value="{{ old('street', $user->address->street) }}">
            </div>
            <div class="col-md-3">
              <label for="number">Número</label>
              <input required type="text" class="form-control" name="number" id="number" placeholder="1234" value="{{ old('number', $user->address->number) }}">
            </div>
            <div class="col-md-3">
              <label for="floor">Piso</label>
              <input type="text" class="form-control" name="floor" id="floor" placeholder="ej: 2" value="{{ old('floor', $user->address->floor) }}">
            </div>
            <div class="col-md-3">
              <label for="departament">Departamento</label>
              <input type="text" class="form-control" name="departament" id="departament" placeholder="ej: B" value="{{ old('departament', $user->address->departament) }}">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-3">
              <label for="locality">Barrio</label>
              <input required type="text" class="form-control" name="locality" id="locality" placeholder="ej: Almagro" value="{{ old('locality', $user->address->locality) }}">
            </div>
            <div class="col-md-3">
              <label for="cp">CP</label>
              <input type="text" class="form-control" name="cp" id="cp" placeholder="1234" value="{{ old('cp', $user->address->cp) }}">
            </div>
            <div class="col-md-3">
              <label for="state">Provincia</label>
              <input required type="text" class="form-control" name="state" id="state" placeholder="ej: Buenos Aires" value="{{ old('state', $user->address->state) }}">
            </div>
            <div class="col-md-3">
              <label for="country">Pais</label>
              <input required type="text" class="form-control" name="country" id="country" placeholder="Argentina" value="{{ old('country', $user->address->country) }}">
            </div>
          </div>

          <div class="text-right">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          </div>

        </form>
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
