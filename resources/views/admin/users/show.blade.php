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
  
  <div class="container">

    <div class="row">
      <div class="col-md-12 text-center">
        <h1>Datos del usuario <strong>{{ $user->name }}</strong></h1>
      </div>
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
                        <th class="col-lg-2 col-md-2">Número</th>
                        <th class="col-lg-3 col-md-3">Localidad</th>
                        <th class="col-lg-2 col-md-2">C.P</th>
                        <th class="col-lg-2 col-md-2">Provincia</th>
                    </tr>
                  </thead>

                  <tbody>

                    @foreach ($addresses as $address)
                      <tr data-id="{{ $address->id }}">
                        <td class="col-lg-3 col-md-3">
                          {{ $address->street }}
                        </td>
                        <td class="col-lg-2 col-md-2">
                          {{ $address->number }}
                        </td>
                        <td class="col-lg-3 col-md-3">
                          {{ $address->locality }}
                        </td>
                        <td class="col-lg-2 col-md-2">
                          {{ $address->cp }}
                        </td>
                        <td class="col-lg-2 col-md-2">
                          {{ $address->state }}
                        </td>
                      </tr>
                    @endforeach

                  </tbody>

                  <tfoot>
                    <tr>
                      <th class="col-lg-3 col-md-3">Calle</th>
                      <th class="col-lg-2 col-md-2">Número</th>
                      <th class="col-lg-3 col-md-3">Localidad</th>
                      <th class="col-lg-2 col-md-2">C.P</th>
                      <th class="col-lg-2 col-md-2">Provincia</th>
                    </tr>
                  </tfoot>

                </table>
              </div>
            </div>

            <div class="active tab-pane" id="subscriptions">
              <div class="table-responsive">
      
                <table class="active table table-hover table-condensed">

                  <thead>
                    <tr>
                      <th class="col-lg-3 col-md-3">Fecha</th>
                      <th class="col-lg-2 col-md-2">Producto</th>
                      <th class="col-lg-2 col-md-2">Frecuencia</th>
                      <th class="col-lg-2 col-md-2">Precio</th>
                      <th class="col-lg-2 col-md-2">Estado</th>
                    </tr>
                  </thead>

                  <tbody>

                    @foreach ($subscriptions as $subscription)
                      <tr data-id="{{ $subscription->id }}">
                        <td class="col-lg-3 col-md-3">
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
                      </tr>
                    @endforeach

                  </tbody>

                  <tfoot>
                    <tr>
                      <th class="col-lg-3 col-md-3">Fecha</th>
                      <th class="col-lg-2 col-md-2">Producto</th>
                      <th class="col-lg-2 col-md-2">Frecuencia</th>
                      <th class="col-lg-2 col-md-2">Precio</th>
                      <th class="col-lg-2 col-md-2">Estado</th>
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


@endsection
<!-- Content Admin end -->

<!-- Footer Admin -->
@section('footer')
  @include('admin.includes.footer')
@endsection
<!-- Footer Admin end -->