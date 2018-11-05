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
      <div id="message" class="fixed-top col-md-12 alert alert-success small" role="alert">
      </div>
    </div>

    <div class="row">            
      <div class="col-md-12 text-right">
        <a href="{{-- {{ url('/admin/users/create') }} --}}" type="button" class="btn btn-secondary btn-md mb-3">Agregar Usuario&nbsp; <i class="material-icons">person_add</i></a>
      </div>
    </div>

    <div class="row">
    	<div class="col-md-12">
        <div class="table-responsive-sm text-center">
        
          <table class="table">

            <thead>
                <tr>
                    <th class="col-lg-1 col-md-1">#</th>
                    <th class="col-lg-2 col-md-2">Nombre</th>
                    <th class="col-lg-3 col-md-3">Email</th>
                    <th class="col-lg-1 col-md-1">Imágen</th>
                    <th class="col-lg-3 col-md-4 text-center">Opciones</th>
                </tr>
            </thead>

            <tbody>

              {{-- @foreach ($users as $user)
                <tr data-id="{{ $user->id }}">
                  <td class="col-lg-1 col-md-1">{{ $user->id }}</td>
                  <td class="col-lg-2 col-md-2">{{ $user->name }}</td>
                  <td class="col-lg-3 col-md-3">{{ $user->email }}</td>
                  <td class="col-lg-1 col-md-1">{{ $user->image }}</td>
                  <td class="col-lg-3 col-md-4 text-center">
                    <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" class="btn btn-success" title="Editar Usuario">
                      <i class="material-icons">edit</i>
                    </a>
                    <button type="button" rel="tooltip" class="btn btn-danger btn_delete_prod btn-confirm" title="Eliminar Usuario">
                      <i class="material-icons">delete</i>
                    </button>
                  </td>
                </tr>
              @endforeach --}}

            </tbody>

          </table>
        </div>
      </div>

    </div>
          
    <div class="row">
      <div class="col-md-12">
        {{-- {{ $users->links('pagination.default') }} --}}
      </div>
    </div>

  </div>


  <form action="{{-- {{ url('/admin/users/:USER_ID/') }} --}}" method="DELETE" id="form-delete">
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
      $("#mi-modal").modal('show');
    });

    $('.btn_delete_prod').click(function(){

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
          $("#message").fadeOut(1500);
          },2000);
          $("#mi-modal").modal('hide');
        });
      });

      $("#modal-btn-no").on("click", function(){
        $("#mi-modal").modal('hide');
      });

    });

  });
</script>   

@endsection
