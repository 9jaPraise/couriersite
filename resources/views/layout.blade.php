<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Courier Management System </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('style/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('style/css/style.css')}}">
</head>
<body>


<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="{{asset('style/img/logo/logo.png')}}" alt="" width="30" height="24">
          </a>

          <form class="d-flex">
            <a class="nav-link text-light" href="{{route('welcome.index')}}">Track Item</a>
            <a class="nav-link text-light"href="{{route('login')}}">Login</a>
          </form>
        </div>
    </nav>
</header>

@yield('main')

<footer>

    <div class="container">
                <p class="text-center">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                </p>
    </div>
</footer>




    <!-- JS here -->

    <script src="{{asset('style/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('style/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('style/js/popper.min.js')}}"></script>
    <script src="{{asset('style/js/bootstrap.min.js')}}"></script>

</body>
</html>
