<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="{{asset('/js/jquery.validate.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/js/datatables.min.js')}}"></script>
    <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/images/favicon.png')}}">
  <title>Matrix Admin panel - б/у запчасти для автомобилей</title>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800">
  <link href="{{asset('/css/admin.css')}}" rel="stylesheet">
  <link href="{{asset('/css/datatables.min.css')}}" rel="stylesheet">
  <link href="{{asset('/css/select2.min.css')}}" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

  <![endif]-->
</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
  <!-- ============================================================== -->
  <!-- Topbar header - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
      <div class="navbar-header" data-logobg="skin5">
        <!-- This is for the sidebar toggle which is visible on mobile only -->
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <a class="navbar-brand" href="/">
          <!-- Logo icon -->
          <b class="logo-icon p-l-10">
            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
            <!-- Dark Logo icon -->
            <img src="{{asset('/images/logo-icon.png')}}" alt="" class="light-logo" />

          </b>
          <!--End Logo icon -->
          <!-- Logo text -->
        </a>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Toggle which is visible on mobile only -->
        <!-- ============================================================== -->
        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
      </div>
      <!-- ============================================================== -->
      <!-- End Logo -->
      <!-- ============================================================== -->
      <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav float-left mr-auto">
          <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
        </ul>
        <!-- ============================================================== -->
        <!-- Right side toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav float-right">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$profile->name}}</a>
            <div class="dropdown-menu dropdown-menu-right user-dd animated">
              <a class="dropdown-item" href="{{route('profile.index')}}"><i class="ti-user m-r-5 m-l-5"></i>Мой профайл</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{route('profile.edit')}}"><i class="ti-settings m-r-5 m-l-5"></i>Изменить</a>
             <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fa fa-power-off m-r-5 m-l-5"></i>{{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>

              <div class="dropdown-divider"></div>
              <div class="p-l-30 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">Закрыть</a></div>
            </div>
          </li>
          <!-- ============================================================== -->
          <!-- User profile and search -->
          <!-- ============================================================== -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- ============================================================== -->
  <!-- End Topbar header -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Left Sidebar - style you can find in sidebar.scss  -->
  <!-- ============================================================== -->
  <aside class="left-sidebar" data-sidebarbg="skin5">        <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav">
        @include('admin._sidebar')
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  <!-- ============================================================== -->
  <!-- End Left Sidebar - style you can find in sidebar.scss  -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Page wrapper  -->
  <!-- ============================================================== -->
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">
            @yield('title')
          </h4>
          <div class="ml-auto text-right">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Рабочий стол</a></li>
                <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
      <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
          <div class="card card-hover">
            <div class="box bg-cyan text-center">
              <a href="{{route('home')}}" target="_blank"><h1 class="font-light text-white"><i class="fas fa-globe"></i></h1>
                <h6 class="text-white">Сайт</h6>
              </a>
            </div>
          </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
          <div class="card card-hover">
            <div class="box bg-success text-center">
              <a href="{{route('books.index')}}">
                <h1 class="font-light text-white"><i class="fas fa-book"></i></h1>
              <h6 class="text-white">Книги</h6>
              </a>
            </div>
          </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
          <div class="card card-hover">
            <div class="box bg-warning text-center">
              <a href="{{route('authors.index')}}">
              <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
              <h6 class="text-white">Авторы</h6>
              </a>
            </div>
          </div>
        </div>
        <!-- Column -->

      </div>
      <!-- ============================================================== -->
      <!-- Start Page Content -->
      <!-- ============================================================== -->
    @include('admin.errors')
            @yield('content')
      <!-- BEGIN MODAL -->

      <!-- Modal Add Category -->

      <!-- END MODAL -->

      <!-- ============================================================== -->
      <!-- End PAge Content -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Right sidebar -->
      <!-- ============================================================== -->
      <!-- .right-sidebar -->
      <!-- ============================================================== -->
      <!-- End Right sidebar -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">

    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Page wrapper  -->
  <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->

<script src="{{'/js/admin.js'}}"></script>
<script src="{{'/js/select2.full.min.js'}}"></script>
<script src="{{'/js/select2.min.js'}}"></script>

<!-- Bootstrap tether Core JavaScript -->

{{--<script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>--}}
<!-- slimscrollbar scrollbar JavaScript -->
{{--<script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>--}}
<!--Wave Effects -->

<!--Menu sidebar -->
{{--<script src="dist/js/sidebarmenu.js"></script>--}}
<!--Custom JavaScript -->
{{--<script src="dist/js/custom.min.js"></script>--}}
<!-- this page js -->
<!-- ck editor -->
<script type="text/javascript" src="{{ ('/assets/ckeditor/ckeditor.js') }}"></script>
@yield('script')

</body>

</html>