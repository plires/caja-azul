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

      <div class="col-md-4">
        <div class="box box-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-aqua-active text-center">
            <!-- /.widget-user-image -->
            <h3 class="profile-username text-center"><i class="fa fa-user"></i>{{ $user->name }} {{ $user->last_name }}</h3>
            <h5 class="widget-user-desc">{{ $user->type }}</h5>
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
                  <span class="pull-right {{-- badge bg-blue --}}">{{ $user->type }}</span>
                </a>
              </li>

            </ul>

          </div>
          <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" type="button" class="transition btn btn-info btn-block">
              <i class="fa fa-edit"></i>Editar
            </a>
        </div>
      </div>

      <div class="col-md-8">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active">
              <a href="#address" data-toggle="tab">
                <i class="fa fa-map-pin"></i>Direcciones de Entrega
              </a>
            </li>
            <li>
              <a href="#subscriptions" data-toggle="tab">
                <i class="fa fa-usd" aria-hidden="true"></i>Subscripciones
              </a>
            </li>
          </ul>
          <div class="tab-content">

            <div class="active tab-pane" id="address">
              <div class="table-responsive">
      
                <table class="table table-hover table-condensed">

                  <thead>
                    <tr class="active">
                        <th class="col-lg-1 col-md-1">#</th>
                        <th class="col-lg-2 col-md-2">Calle</th>
                        <th class="col-lg-2 col-md-2">Número</th>
                        <th class="col-lg-2 col-md-2">Localidad</th>
                        <th class="col-lg-3 col-md-3">C.P</th>
                        <th class="col-lg-3 col-md-4">Provincia</th>
                    </tr>
                  </thead>

                  <tbody>

                    @foreach ($addresses as $address)
                      <tr data-id="{{ $address->id }}">
                        <td class="col-lg-2 col-md-1">
                          {{ $address->id }}
                        </td>
                        <td class="col-lg-2 col-md-2">
                          {{ $address->street }}
                        </td>
                        <td class="col-lg-2 col-md-2">
                          {{ $address->number }}
                        </td>
                        <td class="col-lg-2 col-md-2">
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
                      <th class="col-lg-1 col-md-1">#</th>
                      <th class="col-lg-2 col-md-2">Calle</th>
                      <th class="col-lg-2 col-md-2">Número</th>
                      <th class="col-lg-2 col-md-2">Localidad</th>
                      <th class="col-lg-3 col-md-3">C.P</th>
                      <th class="col-lg-3 col-md-4">Provincia</th>
                    </tr>
                  </tfoot>

                </table>
              </div>
            </div>

            <div class="tab-pane" id="subscriptions">
              <div class="table-responsive">
      
                <table class="table table-hover table-condensed">

                  <thead>
                    <tr class="active">
                      <th class="col-lg-1 col-md-1">#</th>
                      <th class="col-lg-2 col-md-2">Fecha</th>
                      <th class="col-lg-2 col-md-2">Estado</th>
                      <th class="col-lg-2 col-md-2">Producto</th>
                      <th class="col-lg-3 col-md-3">Precio</th>
                    </tr>
                  </thead>

                  <tbody>

                    @foreach ($subscriptions as $subscription)
                      <tr data-id="{{ $subscription->id }}">
                        <td class="col-lg-2 col-md-2">
                          {{ $subscription->id }}
                        </td>
                        <td class="col-lg-2 col-md-2">
                          {{ $subscription->arrival_date }}
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
                        <td class="col-lg-4 col-md-4">
                          {{ $subscription->fishBox->name }}
                        </td>
                        <td class="col-lg-2 col-md-2">
                          {{ $subscription->total }}
                        </td>
                      </tr>
                    @endforeach

                  </tbody>

                  <tfoot>
                    <tr>
                      <th class="col-lg-1 col-md-1">#</th>
                      <th class="col-lg-2 col-md-2">Fecha</th>
                      <th class="col-lg-2 col-md-2">Estado</th>
                      <th class="col-lg-2 col-md-2">Producto</th>
                      <th class="col-lg-3 col-md-3">Precio</th>
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
      <!-- /.col -->
    </div>
          
  </div>


@endsection
<!-- Content Admin end -->

<!-- Footer Admin -->
@section('footer')
  @include('admin.includes.footer')
@endsection
<!-- Footer Admin end -->