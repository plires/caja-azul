@extends('admin.layout')

@section('title', 'Listado de Productos')

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
        <h1>Listado de Productos</h1>
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
        <a href="{{ url('/admin/products/create') }}" type="button" class="transition btn btn-info btn-lg mb-2">
          <i class="fa fa-user-plus" aria-hidden="true"></i>Agregar Producto
        </a>
      </div>
    </div>

    <div class="box box-primary p-3">
      <div class="table-responsive">
      
        <table class="table table-hover table-condensed">

          <thead>
            <tr class="active">
                <th class="col-lg-1 col-md-1">#</th>
                <th class="col-lg-1 col-md-1">Nombre</th>
                <th class="col-lg-5 col-md-5">Descripción</th>
                <th class="col-lg-1 col-md-1">Categoría</th>
                <th class="col-lg-1 col-md-1">Imagen</th>
                <th class="col-lg-3 col-md-3 text-center">Opciones</th>
            </tr>
          </thead>

          <tbody>

            @foreach ($products as $product)
              <tr data-id="{{ $product->id }}">
                <td class="col-lg-1 col-md-1">
                  <a class="transition" href="{{ url('/admin/products/'.$product->id.'/show') }}">{{ $product->id }}</a>
                </td>
                <td class="col-lg-1 col-md-1">
                  <a class="transition" href="{{ url('/admin/products/'.$product->id.'/show') }}">{{ $product->name }}</a>
                </td>
                <td class="col-lg-5 col-md-5">
                  <a class="transition" href="{{ url('/admin/products/'.$product->id.'/show') }}">{{ $product->description }}</a>
                </td>
                <td class="col-lg-1 col-md-1">
                  <a class="transition" href="{{ url('/admin/products/'.$product->id.'/show') }}">{{ $product->category->name }}</a>
                </td>
                <td class="col-lg-1 col-md-1">
                  <img src="{{ $product->featured_image_url }}" width="50" alt="{{ $product->name }} - {{ $product->id }}">
                </td>
                <td class="col-lg-3 col-md-3 text-center">
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
                        <a href="{{ url('/admin/products/'.$product->id.'/show') }}" title="Ver Producto">
                          <i class="fa fa-eye"></i>Ver Producto
                        </a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="{{ url('/admin/products/'.$product->id.'/show') }}" title="Ver Producto">
                          <i class="fa fa-eye"></i>Imágenes
                        </a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" title="Editar Producto">
                          <i class="fa fa-edit"></i>Editar Producto
                        </a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <button rel="tooltip" class="btn_delete btn-confirm transition" title="Eliminar Producto">
                          <i class="fa fa-user-times"></i>Eliminar Producto
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
              <th class="col-lg-1 col-md-1">#</th>
              <th class="col-lg-1 col-md-1">Nombre</th>
              <th class="col-lg-5 col-md-5">Descripción</th>
              <th class="col-lg-1 col-md-1">Categoría</th>
              <th class="col-lg-1 col-md-1">Imagen</th>
              <th class="col-lg-3 col-md-3 text-center">Opciones</th>
            </tr>
          </tfoot>

        </table>
      </div>
    </div>
          
    <div class="row">
      <div class="col-md-12 text-center">
        {{ $products->links() }}
      </div>
    </div>

  </div>

  <form action="{{ url('/admin/products/:PRODUCT_ID/') }}" method="DELETE" id="form-delete">
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

    $('.btn_delete').click(function(){

      var row = $(this).parents('tr');
      var id = row.data('id');
      var form = $('#form-delete');
      var url = form.attr('action').replace(':PRODUCT_ID', id) ;
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
