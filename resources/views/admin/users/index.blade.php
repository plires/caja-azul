@extends('admin.layout')

@section('title', 'Listado de Usuarios')

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
        <h1>Listado de Usuarios</h1>
      </div>
    </div>

    <div class="row">
      @if (session('message'))
        <div class="fixed-top col-md-12 alert alert-success small" role="alert">
          {{ session('message') }}
        </div>
      @endif
    </div>


    <div class="row mb-3">            
      <div class="col-md-12 text-right">
        <a href="{{ url('/admin/users/create') }}" type="button" class="transition btn btn-info btn-lg mb-2"><i class="ion-android-person-add"></i>Agregar Usuario</a>
      </div>
    </div>

    <div class="box box-primary p-3">
      <div class="table-responsive">
      
        <table class="table table-hover table-condensed">

          <thead>
            <tr class="active">
                <th class="col-lg-1 col-md-1">#</th>
                <th class="col-lg-2 col-md-2">Nombre</th>
                <th class="col-lg-2 col-md-2">Apellido</th>
                <th class="col-lg-2 col-md-2">Teléfono</th>
                <th class="col-lg-3 col-md-3">Email</th>
                <th class="col-lg-3 col-md-4 text-center">Opciones</th>
            </tr>
          </thead>

          <tbody>

            @foreach ($users as $user)
              <tr data-id="{{ $user->id }}">
                <td class="col-lg-1 col-md-1">
                  <a class="transition" href="{{ url('/admin/users/'.$user->id.'/show') }}">{{ $user->id }}</a>
                </td>
                <td class="col-lg-2 col-md-2">
                  <a class="transition" href="{{ url('/admin/users/'.$user->id.'/show') }}">{{ $user->name }}</a>
                </td>
                <td class="col-lg-2 col-md-2">
                  <a class="transition" href="{{ url('/admin/users/'.$user->id.'/show') }}">{{ $user->last_name }}</a>
                </td>
                <td class="col-lg-2 col-md-2">
                  <a class="transition" href="{{ url('/admin/users/'.$user->id.'/show') }}">{{ $user->phone }}</a>
                </td>
                <td class="col-lg-3 col-md-3">
                  <a class="transition" href="{{ url('/admin/users/'.$user->id.'/show') }}">{{ $user->email }}</a>
                </td>
                <td class="col-lg-3 col-md-4 text-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">Acciones</button>
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a href="{{ url('/admin/users/'.$user->id.'/show') }}" title="Ver Usuario">
                          <i class="mr-2 ion-edit"></i>Ver Usuario
                        </a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" title="Editar Usuario">
                          <i class="mr-2 ion-edit"></i>Editar Usuario
                        </a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="#" rel="tooltip" class="btn_delete_user btn-confirm transition" title="Eliminar Usuario">
                          <i class="mr-2 ion-android-delete"></i>Eliminar Usuario
                        </a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
            @endforeach

          </tbody>

          <tfoot>
            <tr>
              <th class="col-lg-1 col-md-1">#</th>
              <th class="col-lg-2 col-md-2">Nombre</th>
              <th class="col-lg-2 col-md-2">Apellido</th>
              <th class="col-lg-2 col-md-2">Teléfono</th>
              <th class="col-lg-3 col-md-3">Email</th>
              <th class="col-lg-3 col-md-4 text-center">Opciones</th>
            </tr>
          </tfoot>

        </table>
      </div>
    </div>
          
    <div class="row">
      <div class="col-md-12 text-center">
        {{ $users->links() }}
      </div>
    </div>

  </div>


  <form action="{{ url('/admin/users/:USER_ID/') }}" method="DELETE" id="form-delete">
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
      $("#modal-delete-user").modal('show');
    });

    $('.btn_delete_user').click(function(){

      var row = $(this).parents('tr');
      var id = row.data('id');
      var form = $('#form-delete');
      var url = form.attr('action').replace(':USER_ID', id) ;
      var data = form.serialize();

      $("#modal-btn-si").on("click", function(){
        row.fadeOut();

        $.post(url, data, function(result){
          $("#message").fadeIn();
          $("#message").html(result);
          setTimeout(function() {
          $("#message").fadeOut(1500000);
          },2000000);
          $("#modal-delete-user").modal('hide');
        });

      });

      $("#modal-btn-no").on("click", function(){
        $("#modal-delete-user").modal('hide');
      });

    });

  });
</script>   

@endsection
