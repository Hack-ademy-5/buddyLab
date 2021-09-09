<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="{{mix('css/app.css')}}">

    <title>BuddyLab</title>
  </head>
  <body>
    @include('layouts._nav')
    
    @if(session('message'))
        <div class="alert alert-primary" role="alert">
            {{session('message')}}
        </div>
    @endif

    <div class="container">
        @yield('content')
    </div>
    
    @include('layouts._footer')
    
    <script src="{{mix('js/app.js')}}"></script>
    @stack('js')
  </body>
</html>