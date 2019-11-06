
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
  <!-- bootstrap cdn -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/backend/admin" class="logo" style="text-decoration: none; height: 61px; padding: 8px;">
      <span class="logo-lg logo-font"><b>Online<i> Book Shop</i></b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Authentication Links -->
      <li class="nav-item dropdown ml-auto" style="list-style: none;">
          <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
              </a>
          </div>
      </li>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active">
            <a href="/backend/admin"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
        </li>
        <li class="treeview">
          <a href="#" class="mu-font"><i class="fas fa-book"></i> <span>Products</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('book.index')}}" class="mu-font"><i class="far fa-circle"></i> Book list</a></li>
            <li><a href="{{route('category.index')}}" class="mu-font"><i class="far fa-circle"></i> Categories</a></li>
          </ul>
        </li>
        <li><a href="{{route('publisher.index')}}" class="pt-0 mu-font"><i class="fas fa-book-reader"></i><span> Publishers </span></a></li>
        <li><a href="{{route('author.index')}}" class="mu-font"><i class="fas fa-feather-alt"></i> Author</a></li>
        <li><a href="{{route('orders.index')}}" class="mu-font"><i class="fas fa-shopping-cart"></i><span> Orders </span></a></li>
        <li><a href="{{route('customer.index')}}" class="pt-0 mu-font"><i class="fas fa-users"></i><span> Customers </span></a></li>
        <li><a href="{{route('city.index')}}" class="pt-0 mu-font"><i class="fas fa-city"></i><span> Cities </span></a></li>
        <li><a href="{{route('shop.index')}}" class="pt-0 mu-font"><i class="fas fa-store"></i><span> Shops </span></a></li>
        <li><a href="{{route('feedback.index')}}" class="pt-0 mu-font"><i class="far fa-comment-dots"></i><span> Feedbacks </span></a></li>
        <li><a href="#" class="pt-0 mu-font"><i class="fas fa-envelope"></i><span> Books Report </span></a></li>
        <!-- Exam Results -->
        <li class="treeview">
          <a href="#" class="pt-3 mu-font"><i class="fas fa-print"></i><span> Voucher</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{route('voucher.index')}}" class="mu-font"><i class="far fa-circle"></i> See vouncher</a></li>
          </ul>
        </li>
        @if(Auth::user()->hasPermission('view-admin'))
          <li class="treeview">
            <a href="#" class="pt-3 mu-font"><i class="fas fa-cogs"></i><span> Setting</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('administrator.index')}}" class="mu-font"><i class="far fa-circle"></i> Admins </a></li>
              @if(Auth::user()->hasPermission('view-role'))
                <li><a href="{{route('role.index')}}" class="mu-font"><i class="far fa-circle"></i> Roles </a></li>
              @endif
              <li>
              <a class="mu-font" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    <i class="far fa-circle"></i> {{ __('Logout') }}
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </a>
                </li>
            </ul>
          </li>
        @endif
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content container-fluid">

      <!-- Notification alerts  -->
      @include('backend.alerts')
     <!-- Main Content  -->
     @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">wpa31onlineBookshop</a>.</strong> All rights reserved.
  </footer>
</div>
<script src="{{asset('js/app.js')}}"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
@stack('scripts')
<!-- CKEditor Package -->
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'summary-ckeditor' );
  CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
</script>
</body>
</html>