@extends('admin.layout')

@section('title', 'Listado de Suscripciones')

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
        <h1>Listado de Suscripciones</h1>
      </div>
    </div>

    <!-- Errors -->
    @include('admin.includes.errors')

    <div class="row">
      <div id="subscriptionError" class="col-md-12 alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i>
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
        <a href="{{ url('/admin/subscriptions/create') }}" type="button" class="transition btn btn-info btn-lg mb-2">
          <i class="fa fa-user-plus" aria-hidden="true"></i>Agregar Suscripción
        </a>
      </div>
    </div>

    <div class="box box-primary p-3">
      <div class="table-responsive">
      
        <table class="table table-hover table-bordered table-condensed">

          <thead>
            <tr class="active">
              <th>#</th>
              <th>Fecha</th>
              <th>Dia de Entrega</th>
              <th>Frecuencia</th>
              <th>Total</th>
              <th>Estado</th>
              <th>Propietario</th>
              <th>Producto</th>
              <th class="text-center">Opciones</th>
            </tr>
          </thead>

          <tbody>

            @foreach ($subscriptions as $subscription)
              <tr data-id="{{ $subscription->id }}">
                <td>
                  <a class="transition" href="{{ url('/admin/subscriptions/'.$subscription->id.'/show') }}">
                    {{ $subscription->id }}
                  </a>
                </td>
                <td>
                  <a class="transition" href="{{ url('/admin/subscriptions/'.$subscription->id.'/show') }}">
                    {{ \Carbon\Carbon::parse($subscription->order_date)->format('d/m/Y') }}
                  </a>
                </td>
                <td>
                  <a class="transition" href="{{ url('/admin/subscriptions/'.$subscription->id.'/show') }}">
                    {{ $subscription->delivery_day }}
                  </a>
                </td>
                <td>
                  <a class="transition" href="{{ url('/admin/subscriptions/'.$subscription->id.'/show') }}">
                    {{ $subscription->frecuency }}
                  </a>
                </td>
                <td>
                  <a class="transition" href="{{ url('/admin/subscriptions/'.$subscription->id.'/show') }}">
                    {{ $subscription->total }}
                  </a>
                </td>
                <td>
                  <a class="transition" href="{{ url('/admin/subscriptions/'.$subscription->id.'/show') }}">
                    {{ $subscription->status_id }}
                  </a>
                </td>
                <td>
                  <a class="transition" href="{{ url('/admin/subscriptions/'.$subscription->id.'/show') }}">
                    {{ $subscription->user_id }}
                  </a>
                </td>
                <td>
                  <a class="transition" href="{{ url('/admin/subscriptions/'.$subscription->id.'/show') }}">
                    {{ $subscription->fish_box_id }}
                  </a>
                </td>
                <td class="text-center">
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
                        <a href="{{ url('/admin/subscriptions/'.$subscription->id.'/edit') }}" title="Editar Suscripción">
                          <i class="fa fa-edit"></i>Editar Suscripción
                        </a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <button rel="tooltip" class="btn_delete btn-confirm transition" title="Eliminar Suscripción">
                          <i class="fa fa-user-times"></i>Eliminar Suscripción
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
              <th>#</th>
              <th>Fecha</th>
              <th>Dia de Entrega</th>
              <th>Frecuencia</th>
              <th>Total</th>
              <th>Estado</th>
              <th>Propietario</th>
              <th>Producto</th>
              <th class="text-center">Opciones</th>
            </tr>
          </tfoot>

        </table>
      </div>
    </div>
          
  </div>

  <div class="row">
    <div class="col-md-12 text-center">
      {{ $subscriptions->links() }}
    </div>
  </div>

  <form action="{{ url('/admin/subscriptions/:SUBSCRIPTION_ID/') }}" method="DELETE" id="form-delete">
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
    $("#subscriptionError").hide();

    $(".btn-confirm").on("click", function(){
      $("#modal-danger").modal('show');
    });

    $('.btn_delete').click(function(){

      var row = $(this).parents('tr');
      var id = row.data('id');
      var form = $('#form-delete');
      var url = form.attr('action').replace(':SUBSCRIPTION_ID', id) ;
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
        })
        .fail(function(response) {
          row.fadeIn();
          $("#subscriptionError").fadeIn();
          $("#subscriptionError").html('Error al eliminar la suscripción.');
          setTimeout(function() {
          $("#subscriptionError").fadeOut(1300);
          },1800);
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