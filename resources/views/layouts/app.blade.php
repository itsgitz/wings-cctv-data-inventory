<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sayap Mas Utama</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <script src="{{ mix('/js/app.js') }}"></script>
</head>
<body class="d-flex flex-column min-vh-100">
   @include ('shared.navigation')
   <div class="container">
      @yield('content')
   </div>
   <div class="py-4"></div>
   @include ('shared.footer')
</body>
</html>
