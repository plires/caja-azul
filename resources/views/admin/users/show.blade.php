@extends('admin.layout')

@section('title', 'Detalle del Usuario')

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
        <h1>Datos del usuario <strong>{{ $user->name }}</strong></h1>
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
      <div class="col-md-4 col-md-offset-8">
        <div class="box box-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-aqua-active text-center">
            <!-- /.widget-user-image -->
            <h3 class="profile-username text-center"><i class="fa fa-user"></i>{{ $user->name }} {{ $user->last_name }}</h3>
            <h5 class="widget-user-desc">{{ $user->role->name }}</h5>
          </div>
          <div class="box-footer no-padding">
            <ul class="nav nav-stacked">

              <li>
                <a href="#"><b><i class="fa fa-phone"></i>Teléfono</b>
                  <span class="pull-right {{-- badge bg-blue --}}">{{ $user->phone }}</span>
                </a>
              </li>

              <li>
                <a href="#"><b><i class="fa fa-envelope"></i>Email</b>
                  <span class="pull-right {{-- badge bg-blue --}}">{{ $user->email }}</span>
                </a>
              </li>

              <li>
                <a href="#"><i class="fa fa-users"></i></i>Tipo de Usuario</b>
                  <span class="pull-right {{-- badge bg-blue --}}">{{ $user->role->name }}</span>
                </a>
              </li>

            </ul>

          </div>
          <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" type="button" class="transition btn btn-info btn-block">
            <i class="fa fa-edit"></i>Editar
          </a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active">
              <a href="#subscriptions" data-toggle="tab">
                <i class="fa fa-usd" aria-hidden="true"></i>Subscripciones
              </a>
            </li>
            <li>
              <a href="#address" data-toggle="tab">
                <i class="fa fa-map-pin"></i>Direcciones de Entrega
              </a>
            </li>
          </ul>
          <div class="tab-content">

            <div class="tab-pane" id="address">
              <div class="table-responsive">
      
                <table class="table table-hover table-condensed">

                  <thead>
                    <tr>
                        <th class="col-lg-3 col-md-3">Calle</th>
                        <th class="col-lg-1 col-md-1">Número</th>
                        <th class="col-lg-2 col-md-2">Localidad</th>
                        <th class="col-lg-1 col-md-1">C.P</th>
                        <th class="col-lg-2 col-md-2">Provincia</th>
                        <th class="col-lg-3 col-md-3 text-center">Opciones</th>
                    </tr>
                  </thead>

                  <tbody>

                    @if ($addresses)
                      @foreach ($addresses as $address)
                        <tr data-id="{{ $address->id }}">
                          <td class="col-lg-3 col-md-3">
                            {{ $address->street }}
                          </td>
                          <td class="col-lg-1 col-md-1">
                            {{ $address->number }}
                          </td>
                          <td class="col-lg-2 col-md-2">
                            {{ $address->locality }}
                          </td>
                          <td class="col-lg-1 col-md-1">
                            {{ $address->cp }}
                          </td>
                          <td class="col-lg-2 col-md-2">
                            {{ $address->state }}
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
                                  <a href="{{ url('/admin/users/'.$address->id.'/address/edit') }}" title="Editar Dirección">
                                    <i class="fa fa-edit"></i>Editar Dirección
                                  </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                  <button rel="tooltip" class="btn_delete_address btn-confirm transition" title="Eliminar Dirección">
                                    <i class="fa fa-user-times"></i>Eliminar Dirección
                                  </button>
                                </li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                      @endforeach

                    @endif

                  </tbody>

                  <tfoot>
                    <tr>
                      <th class="col-lg-3 col-md-3">Calle</th>
                      <th class="col-lg-1 col-md-1">Número</th>
                      <th class="col-lg-2 col-md-2">Localidad</th>
                      <th class="col-lg-2 col-md-2">Provincia</th>
                      <th class="col-lg-1 col-md-1">C.P</th>
                      <th class="col-lg-3 col-md-3 text-center">Opciones</th>
                    </tr>
                  </tfoot>

                </table>
              </div>
              <div class="text-right">
                <a href="{{ url('admin/users/'. $user->id .'/address/create') }}" type="button" class="btn btn-default mb-2">Crear Dirección&nbsp; <i class="fa fa-plus"></i></a>
              </div>
            </div>

            <div class="active tab-pane" id="subscriptions">
              <div class="table-responsive">
      
                <table class="active table table-hover table-condensed">

                  <thead>
                    <tr>
                      <th class="col-lg-1 col-md-1">Fecha</th>
                      <th class="col-lg-2 col-md-2">Producto</th>
                      <th class="col-lg-2 col-md-2">Frecuencia</th>
                      <th class="col-lg-2 col-md-2">Precio</th>
                      <th class="col-lg-2 col-md-2">Estado</th>
                      <th class="col-lg-3 col-md-3 text-center">Opciones</th>
                    </tr>
                  </thead>

                  <tbody>

                    @foreach ($subscriptions as $subscription)
                      <tr data-id="{{ $subscription->id }}">
                        <td class="col-lg-1 col-md-1">
                          {{ $subscription->arrival_date }}
                        </td>
                        <td class="col-lg-2 col-md-2">
                          {{ $subscription->fishBox->name }}
                        </td>
                        <td class="col-lg-2 col-md-2">
                          {{ $subscription->frecuency }}
                        </td>
                        <td class="col-lg-2 col-md-2">
                          {{ $subscription->total }}
                        </td>
                        <td class="col-lg-2 col-md-2">
                          @if ($subscription->status->id == 1)
                          <span class="label label-warning">
                            {{ $subscription->status->name }}
                          </span>
                          @endif
                          @if ($subscription->status->id == 2)
                          <span class="label label-success">
                            {{ $subscription->status->name }}
                          </span>
                          @endif
                          @if ($subscription->status->id == 3)
                          <span class="label label-danger">
                            {{ $subscription->status->name }}
                          </span>
                          @endif
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
                                <a href="{{ url('/admin/users/'.$user->id.'/show') }}" title="Ver Suscripción">
                                  <i class="fa fa-eye"></i>Ver Suscripción
                                </a>
                              </li>
                              <li>
                                <a href="{{ url('/admin/address//edit') }}" title="Editar Suscripción">
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
                      <th class="col-lg-1 col-md-1">Fecha</th>
                      <th class="col-lg-2 col-md-2">Producto</th>
                      <th class="col-lg-2 col-md-2">Frecuencia</th>
                      <th class="col-lg-2 col-md-2">Precio</th>
                      <th class="col-lg-2 col-md-2">Estado</th>
                      <th class="col-lg-3 col-md-3 text-center">Opciones</th>
                    </tr>
                  </tfoot>

                </table>
              </div>
            </div>

          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 text-right">
        <a href="{{ url('admin/users') }}" type="button" class="btn btn-default btn-lg mb-2">Volver a Usuarios&nbsp; <i class="fa fa-arrow-left"></i></a>
      </div>
    </div>
          
  </div>

  <form action="{{ url('admin/users/:ADDRESS_ID/address/delete') }}" method="DELETE" id="form-delete">
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

  $("#message").hide();

    $(".btn-confirm").on("click", function(){
      $("#modal-danger").modal('show');
    });

    $('.btn_delete_address').click(function(){

      var row = $(this).parents('tr');
      var id = row.data('id');
      var form = $('#form-delete');
      var url = form.attr('action').replace(':ADDRESS_ID', id) ;
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
    
</script>

@endsection