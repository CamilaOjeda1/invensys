<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{ asset('vendor/dist/img/logo3.png') }}" alt="Invensys Logo" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Invensys</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image"> 
          <img src="{{ asset('vendor/dist/img/user.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
            <a href="{{ route('inicio') }}" class="nav-link {{ request()->is('inicio') ? 'active' : '' }}">
              <i class="fas fa-home nav-icon"></i>
              <p>
                Inicio
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('venta.index') }}" class="nav-link {{ request()->is('venta*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-shopping-basket"></i>
              <p>
                Venta
              </p>
            </a>
          </li>
          <li class="nav-item {{ request()->is('producto*') || request()->is('proveedor*') || request()->is('marca*') || request()->is('categoria*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('producto*') || request()->is('proveedor*') || request()->is('marca*') || request()->is('categoria*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Mantenedores
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('producto.index') }}" class="nav-link {{ request()->is('producto*') ? 'active' : '' }}">
                  <i class="fas fa-shopping-basket"></i>
                  <p>Productos</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('proveedor.index') }}" class="nav-link {{ request()->is('proveedor*') ? 'active' : '' }}">
                  <i class="fas fa-shopping-basket"></i>
                  <p>Proveedores</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('marca.index') }}" class="nav-link {{ request()->is('marca*') ? 'active' : '' }}">
                  <i class="fas fa-shopping-basket"></i>
                  <p>Marca</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('categoria.index') }}" class="nav-link {{ request()->is('categoria*') ? 'active' : '' }}">
                  <i class="fas fa-shopping-basket"></i>
                  <p>Categorias</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Administración
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('usuarios.lista') }}" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Gestión de Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('roles.lista') }}" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Gestión de Roles</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('cerrar_sesion') }}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Cerrar sesión
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>