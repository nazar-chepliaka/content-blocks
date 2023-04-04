<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Админ</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!-- Theme style -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
        <link rel="manifest" href="/favicons/site.webmanifest">
        <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#1d232d">
        <link rel="shortcut icon" href="/favicons/favicon.ico">
        <meta name="msapplication-TileColor" content="#1d232d">
        <meta name="msapplication-config" content="/favicons/browserconfig.xml">
        <meta name="theme-color" content="#1d232d">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('admin/css/builded/styles.css') }}">
    
    <!-- Scripts -->
    <script src="{{ asset('/assets/common/js/manifest.js') }}"></script>
    <script src="{{ asset('admin/js/builded/app.js') }}"></script>
    

  @yield('head')

</head>
<body class="hold-transition sidebar-mini">

@yield('modals')

<div class="wrapper">

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" style="padding: 15px 25px 0px 25px;align-items: center;display: flex;justify-content: center;">
        <x-application-logo class="block w-auto" height="100" />
    </a>

    @include('admin-theme.templates.includes.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <header class="bg-white shadow" style="z-index: 999;position: relative;">
        <div class="mx-auto px-4 sm:px-6 lg:px-8" >
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="mx-auto">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                        </div>

                        <div class="-mr-2 flex items-center sm:hidden">
                            <form method="POST" action="{{ route('logout') }}" id="logout" class="text-right">
                                        @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    Вийти <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

        </div>
    </header>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <div class="content" style="margin-top: 40px;">
      {{-- {{ Breadcrumbs::render() }} --}}
      @include('admin-theme.templates.includes.alerts')
      @yield('content')

    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap 4 -->
<script src="{{ asset('admin/js/adminlte.min.js') }}"></script>
<!-- AdminLTE App -->

@yield('scripts')

@stack('footer-scripts')

</body>
</html>
