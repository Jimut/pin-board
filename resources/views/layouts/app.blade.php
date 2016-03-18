<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Pin Board</title>

  <!-- Fonts -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

  <!-- Styles -->
  <link href="{{ URL::asset('includes/bootstrap-3.3.6/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/css/main.css') }}" rel="stylesheet">
  {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

  <style>
    body {
      font-family: 'Lato';
    }

    .fa-btn {
      margin-right: 6px;
    }
  </style>
</head>
<body id="app-layout">
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
          Pin Board
        </a>
      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
          @else
            <li><a href="{{ route('pin.create') }}">New Pin</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Account</a></li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
              </ul>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        @if (session('notice'))
          <div class="alert alert-info">{{ session('notice') }}</div>
        @endif
      </div>
    </div>

    @yield('content')
  </div>

  <!-- JavaScripts -->
  <script src="{{ URL::asset('includes/jquery/jquery-2.2.1.min.js') }}"></script>
  <script src="{{ URL::asset('includes/bootstrap-3.3.6/js/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('includes/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ URL::asset('includes/masonry/masonry.pkgd.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/app.js') }}"></script>
</body>
</html>
