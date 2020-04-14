<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Home | Dashboard</title>
      <link rel="icon" href="{{ asset('dashboard.gif') }}" type="image/x-icon"/>
      <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
   </head>
   <body>
      <div id="app">
         <cheader></cheader>
         <cheadbanner></cheadbanner>
         <ccontent></ccontent>
         @yield('content')
      </div>
      <script src="{{ asset('js/app.js') }}" crossorigin="anonymous"></script>
   </body>
</html>