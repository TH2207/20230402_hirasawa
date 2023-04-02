<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Rese</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}" defer></script>
  @yield('css')
</head>

<body class="font-sans antialiased">
  <div class="container">
    <div class="card">
      @yield('content')
    </div>
  </div>
</body>

</html>