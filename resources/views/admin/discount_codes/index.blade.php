@extends('admin.layout')

@section('title', 'Listado de Cupones de Descuento')

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

  <!-- Modal Confirmation -->
  @include('admin.includes.confirmation')

  <div class="container">

    <div class="row">
      <div class="col-md-12 text-center">
        <h1>Listado de Cupones de Descuento</h1>
      </div>
    </div>

    <div class="row">
      <div id="message" class="col-md-12 alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-check"></i>
          {{ session('message') }}
        </div>
    </div>

    <div class="row mb-3">            
      <div class="col-md-12 text-right">
        <a href="{{ url('/admin/discount_codes/create') }}" type="button" class="transition btn btn-info btn-lg mb-2">
          <i class="fa fa-user-plus" aria-hidden="true"></i>Agregar Cupon de Descuento
        </a>
      </div>
    </div>

    <div class="box box-primary p-3">
      <div class="table-responsive">
      
        <table class="table table-hover table-condensed">

          <thead>
            <tr class="active">
              <th class="col-md-2">Nombre</th>
              <th class="col-md-4">Descripcion</th>
              <th class="col-md-1 text-center">Desde</th>
              <th class="col-md-1 text-center">Hasta</th>
              <th class="col-md-1 text-center">Descuento</th>
              <th class="col-md-3 text-center">Opciones</th>
            </tr>
          </thead>

          <tbody>

            @foreach ($discountsCodes as $discount)
              <tr data-id="{{ $discount->id }}">
                <td class="col-md-2">
                  <a class="transition" href="{{ url('/admin/discount_codes/'.$discount->id.'/show') }}">{{ $discount->name }}</a>
                </td>
                <td class="col-md-4">
                  <a class="transition" href="{{ url('/admin/discount_codes/'.$discount->id.'/show') }}">{{ $discount->description }}</a>
                </td>
                <td class="col-md-1 text-center">
                  <a class="transition" href="{{ url('/admin/discount_codes/'.$discount->id.'/show') }}">
                    {{ \Carbon\Carbon::parse($discount->start_date)->format('d/m/Y') }}
                  </a>
                </td>
                <td class="col-md-1 text-center">
                  <a class="transition" href="{{ url('/admin/discount_codes/'.$discount->id.'/show') }}">
                    {{ \Carbon\Carbon::parse($discount->end_date)->format('d/m/Y') }}
                  </a>
                </td>
                <td class="col-md-1 text-center">
                  <a class="transition" href="{{ url('/admin/discount_codes/'.$discount->id.'/show') }}">{{ $discount->discount }}</a>
                </td>
                <td class="col-md-3 text-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">
                      <i class="fa fa-tasks" aria-hidden="true"></i>Acciones
                    </button>
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a href="{{ url('/admin/discount_codes/'.$discount->id.'/show') }}" title="Ver Cupon">
                          <i class="fa fa-eye"></i>Ver Cupon
                        </a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="{{ url('/admin/discount_codes/'.$discount->id.'/edit') }}" title="Editar Cupon">
                          <i class="fa fa-edit"></i>Editar Cupon
                        </a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <button rel="tooltip" class="btn_delete_user btn-confirm transition" title="Eliminar Cupon">
                          <i class="fa fa-user-times"></i>Eliminar Cupon
                        </button>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
            @endforeach

          </tbody>

          <tfoot>
            <tr>
              <th class="col-md-2">Nombre</th>
              <th class="col-md-4">Descripcion</th>
              <th class="col-md-1 text-center">Desde</th>
              <th class="col-md-1 text-center">Hasta</th>
              <th class="col-md-1 text-center">Descuento</th>
              <th class="col-md-3 text-center">Opciones</th>
            </tr>
          </tfoot>

        </table>
      </div>
    </div>
          
    <div class="row">
      <div class="col-md-12 text-center">
        {{ $discountsCodes->links() }}
      </div>
    </div>

  </div>

  <form action="{{ url('/admin/discount_codes/:CUPON_ID/') }}" method="DELETE" id="form-delete">
    <input name="_method" type="hidden" value="DELETE">
    {{ csrf_field() }}
  </form>

@endsection
<!-- Content Admin end -->

<!-- Footer Admin -->
@section('footer')
  @include('admin.includes.footer')
@endsection
<!-- Footer Admin end -->

@section('scripts')

<script>
  $(document).ready(function(){

    $("#message").hide();

    $(".btn-confirm").on("click", function(){
      $("#modal-danger").modal('show');
    });

    $('.btn_delete_user').click(function(){

      var row = $(this).parents('tr');
      var id = row.data('id');
      var form = $('#form-delete');
      var url = form.attr('action').replace(':CUPON_ID', id) ;
      var data = form.serialize();
      row.fadeOut();

      $("#modal-btn-si").on("click", function(){
        
        $.post(url, data, function(result){
          $("#message").fadeIn();
          $("#message").html(result);
          setTimeout(function() {
          $("#message").fadeOut(800);
          },1300);
          $("#modal-danger").modal('hide');
        });
      });

      $("#modal-btn-no").on("click", function(){
        row.fadeIn();
        $("#modal-danger").modal('hide');
      });

    });

  });
</script>

@endsection