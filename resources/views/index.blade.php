@include('sitebar')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'My Laravel App')</title>

  {{-- Vite directive to include compiled CSS and JS --}}
  @vite(['resources/js/app.js'])
</head>
<body>
  <div class="container">
    {{-- <button class="btn btn-primary">Click Me</button> --}}
  </div>
</body>
</html>
