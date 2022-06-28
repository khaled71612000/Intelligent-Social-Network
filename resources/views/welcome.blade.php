<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Laravel</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <!-- Styles -->
    <style>
        html,
        body {
            z-index: 999;
            padding: 0;
            margin: 0;
            overflow-x: hidden;
            height: 100%;
            position: relative;
        }
        #app,  .container, .container-fluid {
          height: 100%;
        }
    </style>

</head>

<body>
    <div id="app">
        <div class="container-fluid" style="padding:0;">
            <App></App>
        </div>
    </div>
    {{-- <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">
                    <i class="fa fa-home"></i>
                    Home
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="fa fa-envelope-o">
                      <span class="badge badge-danger">11</span>
                    </i>
                    Link
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">
                    <i class="fa fa-envelope-o">
                      <span class="badge badge-warning">11</span>
                    </i>
                    Disabled
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-envelope-o">
                      <span class="badge badge-primary">11</span>
                    </i>
                    Dropdown
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </li>
              </ul>
              <ul class="navbar-nav ">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="fa fa-bell">
                      <span class="badge badge-info">11</span>
                    </i>
                    Test
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="fa fa-globe">
                      <span class="badge badge-success">11</span>
                    </i>
                    Test
                  </a>
                </li>
              </ul>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-envelope-o">
                    <span class="badge badge-primary">11</span>
                  </i>
                  Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Logout</a>
                  <a class="dropdown-item" href="#">Login</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">SignUp</a>
                </div>
              </li>
            </div>
          </nav> --}}
    <!-- Sidebar -->
    <!-- open sidebar menu -->



    {{-- <div class="row flex-grow-1">
                              <div class="col-md-2 border">
                                  Bottom Left
                              </div>
                              <div class="col-md-10 border">
                                  Bottom Right
                              </div>
                          </div> --}}
    <!-- End sidebar -->
    {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
    @else
    <a href="{{ route('login') }}">Login</a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}">Register</a>
    @endif
    @endauth
    </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>

        <div class="links">
            <a href="https://laravel.com/docs">Docs</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://blog.laravel.com">Blog</a>
            <a href="https://nova.laravel.com">Nova</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://vapor.laravel.com">Vapor</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
    </div>
    </div> --}}
</body>

</head>

</html>
