@extends('admin.layout')

<!-- Extra css -->
@section('extra_css')
<!-- Datepicker -->
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection
<!-- Extra css end -->

@section('title', 'Editar Cupon de Descuento')

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
        <h1>Editar Cupon de Descuento {{ $discountCode->name }}</h1>
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
        
          <form method="post" action="{{ url('/admin/discount_codes/'. $discountCode->id .'/edit') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group row">
              <div class="col-md-12">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre del cupon" value="{{ old('name', $discountCode->name) }}">
              </div>
              <div class="col-md-12">
                <label for="description">Apellido</label>
                <textarea class="form-control" rows="6" name="description" id="description" placeholder="Descripcion y alcance del descuento...">{{ old('description', $discountCode->description) }}</textarea>
              </div>
            </div>

            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Rango de fechas</h3>
              </div>
              <div class="box-body">
                
                <!-- Date -->
                <div class="form-group">
                  <label>Válido desde:</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right datepicker" name="start_date" id="start_date" data-provide="datepicker" value="{{ old('start_date', date('d-m-Y', strtotime($discountCode->start_date))) }}">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- Date -->
                <div class="form-group">
                  <label>Válido hasta:</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right datepicker" name="end_date" id="end_date" data-provide="datepicker" value="{{ old('end_date', date('d-m-Y', strtotime($discountCode->end_date))) }}">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

              </div>
              <!-- /.box-body -->

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="discount">% Descuento</label>
                  <input type="number" class="form-control" name="discount" id="discount" placeholder="% de Descuento a aplicar" value="{{ old('discount', $discountCode->discount) }}">
                </div>
              </div>

            </div>

            <div class="text-right">
              <a href="{{ url('admin/discount_codes/') }}" type="button" class="transition btn btn-info">
                <i class="fa fa-backward"></i>Cancelar
              </a>
              <button type="submit" class="transition btn btn-info">
                <i class="fa fa-save"></i>Registrar Cupon de descuento
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

<!-- Extra js -->
@section('scripts')

<!-- Datapicker -->
<script src="{{ asset('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('adminlte/bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function() {

    $('.datepicker').datepicker({
      pickTime: false,
      format : 'dd-mm-yyyy',
      autoclose: true,
      language: 'es'
    });
  });
</script>

@endsection
<!-- Extra js end -->
