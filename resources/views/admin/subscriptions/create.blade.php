@extends('admin.layout')

<!-- Extra css -->
@section('extra_css')
<!-- Datepicker -->
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection
<!-- Extra css end -->

@section('title', 'Crear Nueva Suscripción')

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
        <h1>Nueva Suscripción</h1>
      </div>
    </div>

    <!-- Errors -->
    @include('admin.includes.errors')

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
        <div class="box box-primary box-body">
        
          <form id="formSubscriptions" method="post" action="{{ url('/admin/subscriptions/') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group row">
              <div class="col-md-12">
                <label for="date">Fecha</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" name="date" id="date" data-provide="datepicker" placeholder="Ingrese la fecha" value="{{ old('date') }}">
                </div>
              </div>
            </div>
     
            <div class="form-group row">
              <div class="col-md-12">
                <label for="user_id">Usuario</label>
                <input type="text" class="typeahead form-control" name="user_id" id="user_id" placeholder="Ingrese un usuario" value="{{ old('user_id') }}">
              </div>
            </div>

            <div class="form-group row">

              <div class="col-md-6">
                <label for="delivery_day">Día de Entrega</label>
                <select  id="delivery_day" name="delivery_day" class="form-control">
                  <option>Martes</option>
                  <option>Jueves</option>
                </select>
              </div>

              <div class="col-md-6">
                <label for="frecuency">Frecuencia</label>
                <select  id="frecuency" name="frecuency" class="form-control">
                  <option>Semanal</option>
                  <option>Quincenal</option>
                  <option>Mensual</option>
                </select>
              </div>

            </div>

            <div class="form-group row">

              <div class="col-md-6">
                <label for="status_id">Estado</label>
                <select  id="status_id" name="status_id" class="form-control">
                  @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-6">
                <label for="fish_box">Selección del Producto</label>
                <select  id="fish_box" name="fish_box" class="form-control">
                  @foreach($fishBoxes as $fishBox)
                    <option value="{{ $fishBox->id }}">{{ $fishBox->name }}</option>
                  @endforeach
                </select>
              </div>

            </div>

            <div class="text-right">
              <a href="{{ url('admin/subscriptions/') }}" type="button" class="transition btn btn-info">
                <i class="fa fa-backward"></i>Volver
              </a>
              <button type="submit" class="transition btn btn-info">
                <i class="fa fa-save"></i>Registrar la Suscripción
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


@section('scripts')
  <!-- Typeahead -->
  <script type="text/javascript" src="{{ asset('adminlte/js/typeahead.bundle.min.js') }}"></script>

  <!-- Datapicker -->
  <script src="{{ asset('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('adminlte/bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js') }}"></script>

  <script type="text/javascript">

    $( document ).ready(function() {

      // inicializamos datapicker
      $(document).ready(function() {

        $('.datepicker').datepicker({
          pickTime: false,
          format : 'dd-mm-yyyy',
          autoclose: true,
          language: 'es'
        });
      });

      // Inicializamos typeahead
      var users = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: '{{ url('/admin/users/json') }}'
      });

      $('#formSubscriptions .typeahead').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
      },
      {
        name: 'users',
        source: users
      });


    });

    
  </script>

@endsection
