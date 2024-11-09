<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a  class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light" style="font-size:18px;">{{env("APP_NAME")}}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/AdminLTELogo.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent " data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="{{url('/home')}}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
            <i class="nav-icon fa fa-tachometer"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        @if(Auth::user()->role == 1)
            <li class="nav-item">
            <a href="{{route('events.create')}}" class="nav-link {{ Request::is('events/create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Create Events</p>
            </a>
            </li>
        @endif
        <li class="nav-item">
          <a href="{{route('events.index')}}" class="nav-link {{ Request::is('events') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>ManageEvents</p>
          </a>
        </li>
        @if(Auth::user()->role == 1)
            <li class="nav-item">
                <a href="{{route('registrations.index')}}" class="nav-link {{ Request::is('registrations') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Registrations</p>
                </a>
            </li>
        @endif
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
