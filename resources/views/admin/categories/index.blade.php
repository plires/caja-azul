@extends('admin.layout')

@section('title', 'Listado de Categorias')

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
        <h1>Listado de Categorias</h1>
      </div>
    </div>

    <!-- Errors -->
    @include('admin.includes.errors')

    <div class="row">
      <div id="CategoryWithProducts" class="col-md-12 alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i>
        asd
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
        <a href="{{ url('/admin/categories/create') }}" type="button" class="transition btn btn-info btn-lg mb-2">
          <i class="fa fa-user-plus" aria-hidden="true"></i>Agregar Categoría
        </a>
      </div>
    </div>

    <div class="box box-primary p-3">
      <div class="table-responsive">
      
        <table class="table table-hover table-bordered table-condensed">

          <thead>
            <tr class="active">
                <th class="col-md-1">#</th>
                <th class="col-md-3">Nombre</th>
                <th class="col-md-4">Descripción</th>
                <th class="col-md-4 text-center">Opciones</th>
            </tr>
          </thead>

          <tbody>

            @foreach ($categories as $category)
              <tr data-id="{{ $category->id }}">
                <td class="col-md-1">
                  {{ $category->id }}
                </td>
                <td class="col-md-1">
                  {{ $category->name }}
                </td>
                <td class="col-md-5">
                  {{ $category->description }}
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
                        <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" title="Editar Categoria">
                          <i class="fa fa-edit"></i>Editar Categoria
                        </a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <button rel="tooltip" class="btn_delete btn-confirm transition" title="Eliminar Categoria">
                          <i class="fa fa-user-times"></i>Eliminar Categoria
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
              <th class="col-md-1">#</th>
              <th class="col-md-3">Nombre</th>
              <th class="col-md-4">Descripción</th>
              <th class="col-md-4 text-center">Opciones</th>
            </tr>
          </tfoot>

        </table>
      </div>
    </div>
          
  </div>

  <div class="row">
    <div class="col-md-12 text-center">
      {{ $categories->links() }}
    </div>
  </div>

  <form action="{{ url('/admin/categories/:CATEGORY_ID/') }}" method="DELETE" id="form-delete">
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
    $("#CategoryWithProducts").hide();

    $(".btn-confirm").on("click", function(){
      $("#modal-danger").modal('show');
    });

    $('.btn_delete').click(function(){

      var row = $(this).parents('tr');
      var id = row.data('id');
      var form = $('#form-delete');
      var url = form.attr('action').replace(':CATEGORY_ID', id) ;
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
          console.log(response);
          row.fadeIn();
          $("#CategoryWithProducts").fadeIn();
          $("#CategoryWithProducts").html('La categoria tiene productos asosciados. Elimine dichos productos previamente.');
          setTimeout(function() {
          $("#CategoryWithProducts").fadeOut(1300);
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