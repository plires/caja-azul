Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('adminlte/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ auth()->user()->name }} {{ auth()->user()->last_name }}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">HEADER</li>
      
      {{-- USUARIOS --}}
      <li class="treeview">
        <a class="transition" href="#"><i class="ion-person-stalker"></i> <span>Usuarios</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a class="transition" href="{{ url('/admin/users') }}">
              <i class="fa fa-user-circle-o" aria-hidden="true"></i>Listar Usuarios
            </a>
          </li>
          <li>
            <a class="transition" href="{{ url('/admin/users/create') }}">
              <i class="fa fa-user-plus" aria-hidden="true"></i>Agregar Usuarios
            </a>
          </li>
        </ul>
      </li>
      {{-- USUARIOS END --}}

      {{-- PRODUCTOS --}}
      <li class="treeview">
        <a class="transition" href="#"><i class="ion-person-stalker"></i> <span>Productos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a class="transition" href="{{ url('/admin/products') }}">
              <i class="fa fa-user-circle-o" aria-hidden="true"></i>Listar Productos
            </a>
          </li>
          <li>
            <a class="transition" href="{{ url('/admin/products/create') }}">
              <i class="fa fa-user-plus" aria-hidden="true"></i>Agregar Productos
            </a>
          </li>
        </ul>
      </li>
      {{-- PRODUCTOS END --}}


    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
<!-- Left side column. contains the logo and sidebar end