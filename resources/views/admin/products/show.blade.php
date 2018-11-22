@extends('admin.layout')

@section('title', 'Detalle del producto')

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
        <h1>Datos del Producto <strong>{{ $product->name }}</strong></h1>
      </div>
    </div>

    <div class="row">
      <div id="message" class="col-md-12 alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i>
        {{ session('message') }}
      </div>
    </div>

    <div class="row">

      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-body box-profile">

            <ul class="nav nav-stacked">

              <li>
                <h3><b><i class="fa fa-phone"></i>Nombre:</b></h3>
                <h4>{{ $product->name }}</h4>
              </li>

              <li>
                <h3><b><i class="fa fa-envelope"></i>Descripción:</b></h3>
                <h4>{{ $product->description }}</h4>
              </li>

            </ul>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>

    </div>

    <div class="row">            
      <div class="col-md-12 text-right">

        @if ($errors->any())
          <div class="alert alert-danger small" role="alert">
            @foreach ($errors->all() as $error)
              <ul>
                <li>{{ $error }}</li>
              </ul>
            @endforeach
          </div>
        @endif

        <div class="panel panel-default">
          <div class="panel-body">
            <form action="{{ url('admin/products/'. $product->id .'/images') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input name="photo" type="file" >
              <button type="submit" class="btn btn-info btn-lg mb-2">Agregar Imágen&nbsp; <i class="fa fa-plus"></i></button>
              <a href="{{ url('admin/products') }}" type="button" class="btn btn-default btn-lg mb-2">Volver a Productos&nbsp; <i class="fa fa-arrow-left"></i></a>
            </form>
          </div>
        </div>

      </div>
    </div>

    <div class="row">

      @foreach ($images as $image)

        <div class="col-sm-6 col-md-4 cont text-center mb-2">
          <div class="thumbnail">
            <img class="mb-2 mt-2" src="{{ $image->url }}" alt="alt">
            <div data-id="{{ $image->id }}" class="caption">

              <button type="button" class="btn btn-danger btn-lg mb-2 btn_delete_user btn-confirm">Eliminar&nbsp; <i class="fa fa-trash"></i></button>

              @if ($image->featured)
                <button type="button" class="btn btn-success btn-lg ml-1 mb-2" >
                  <i class="fa fa-heart"></i>
                </button>
              @else
                <a href="{{ url('admin/'.$product->id.'/images/') }}" class="btn btn-info btn-lg ml-1 mb-2">
                  <i class="fa fa-heart"></i>
                </a>
              @endif

            </div>
          </div>
        </div>

      @endforeach

    </div>

  </div>

  <form action="{{ url('/admin/products/:IMAGE_ID/images/') }}" method="DELETE" id="form-delete">
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

      var div = $(this).parents('div');
      var id = div.data('id');
      var form = $('#form-delete');
      var url = form.attr('action').replace(':IMAGE_ID', id) ;
      var data = form.serialize();

      var pepe = $(this).closest('.cont');
      pepe.addClass('hidden');
      console.log(pepe);

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
        pepe.removeClass('hidden');
        $("#modal-danger").modal('hide');
      });

    });

  });
</script>

@endsection