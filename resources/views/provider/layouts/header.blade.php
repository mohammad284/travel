<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>travelco</title>
  <!-- DataTables -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="{{ asset('../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
  <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/change-language/ar" class="nav-link">{{__('عربي')}}</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/change-language/en" class="nav-link">{{__('english')}}</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
       <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="/provider/notifications">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">travelCo</span>
    </a>
    <?php
    use App\Models\User;
      $manager = Auth::user();
      $provider = Auth::user();
      if($provider->type == 'manager'){
          $provider = User::find($provider->company_id);
      }
    ?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset($provider->image)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/provider/myProfile" class="d-block">{{$provider->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/provider/index" class="nav-link {{ (request()->is('provider/index')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{__('Dashboard')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <!-- start trips drop -->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon"><ion-icon name="bus-outline"></ion-icon></i>
              <p>
              {{__('trips')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a  href="/provider/myTrips" class="nav-link {{ (request()->is('provider/myTrips')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  {{__('all trips')}}
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/provider/tripsPrice" class="nav-link {{ (request()->is('provider/tripsPrice')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> {{__('Price adjustment')}} </p>
                </a>
              </li>
            </ul>
          </li>
          <!-- end trips drop -->
          @if($manager->type != 'manager')
          <!-- start trips drop -->
          <li class="nav-item">
            <a  href="/provider/ticketCenters" class="nav-link {{ (request()->is('provider/ticketCenters')) ? 'active' : '' }}">
              <i class="nav-icon"><ion-icon name="storefront-outline"></ion-icon></i>
              <p>
              {{__('Ticket Centers')}}
              </p>
            </a>
          </li>
          <!-- end trips drop -->
          @endif
          <!-- start booking drop -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon"><ion-icon name="bookmark-outline"></ion-icon></i>
              <p>
              {{__('My Booking')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/provider/myOldBooking" class="nav-link {{ (request()->is('provider/myOldBooking')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> {{__('old booking')}} </p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/provider/myNewBooking" class="nav-link {{ (request()->is('provider/myNewBooking')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> {{__('new booking')}} </p>
                </a>
              </li>
            </ul>
          </li> 
          <!-- end booking drop -->
          @if($manager->type != 'manager')
          <!-- start trips drop -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon"><ion-icon name="settings-outline"></ion-icon></i>
              <p>
              {{__('setting')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/provider/managers" class="nav-link {{ (request()->is('provider/managers')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> {{__('managers')}} </p>
                </a>
              </li>
            </ul>
          </li>
          <!-- end trips drop -->
          @endif
          <!-- start trips drop -->
           <li class="nav-item">
            <a  href="/provider/financialReports" class="nav-link {{ (request()->is('provider/financialReports')) ? 'active' : '' }}">
              <i class="nav-icon"><ion-icon name="trending-up-outline"></ion-icon></i>
              <p>
              {{__('Financial Reports')}}
              </p>
            </a>
          </li> 
          <!-- end trips drop -->
          <!-- start logout drop --> 
          <li class="nav-item">
            <a class="nav-link" href="/provider/providerlogout"
              onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
              <i class="nav-icon"><ion-icon name="log-out-outline"></ion-icon></i>
              <span class="link">
                {{__('logout')}}
              </span>
            </a>
            <form id="logout-form" action="/provider/providerlogout" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
          <!-- end logout drop -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>