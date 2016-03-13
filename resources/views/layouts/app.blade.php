<html>
<head>
  <meta charset="UTF-8">
  <title>Pin Board</title>
</head>
<body>

  @if(session('notice'))
    <div class="alert alert-info">{{ session('notice') }}</div>
  @endif

  @yield('content')

</body>
</html>
