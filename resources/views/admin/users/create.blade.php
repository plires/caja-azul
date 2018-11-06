@extends('admin.layout')

@section('title', 'Crear Nuevo Usuario')

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
        <h1>Nuevo Usuario</h1>
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

        <form method="post" action="{{ url('/admin/users') }} enctype="multipart/form-data">

          <div class="form-group row">
            <div class="col-md-6">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Juan" value="{{ old('name') }}">
            </div>
            <div class="col-md-6">
              <label for="last_name">Apellido</label>
              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Perez" value="{{ old('last_name') }}">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label for="phone">Teléfono</label>
              <input type="text" class="form-control" name="phone" id="phone" placeholder="115 052 5504" value="{{ old('phone') }}">
            </div>
            <div class="col-md-6">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="juan@xxx.com" value="{{ old('email') }}">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label for="admin">Tipo de Usuario</label>
              <select id="admin" name="admin" class="form-control">
                <option value="Usuario" selected>Usuario</option>
                <option value="Administrador">Administrador</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Pass" value="{{ old('password') }}">
            </div>
          </div>

          <div class="text-right">
            <button type="submit" class="btn btn-primary">Registrar Usuario</button>
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
