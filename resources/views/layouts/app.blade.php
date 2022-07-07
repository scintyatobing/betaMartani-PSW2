<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('asset/gambar/icon.png')}}">
    <title>BetaMartani</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/style.css')}}">
</head>

<body style="background-color: #bddcbf;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #e4ebe5;">
            <div class="container">
                <img src="{{ asset('asset/gambar/logo.png') }}" width="100" class="d-inline-block align-top" alt="">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                        <li><a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a></li>
                        @role('Admin')
                        <li><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
                        <li><a class="nav-link" href="{{ route('roles.index') }}">Role</a></li>
                        <li><a class="nav-link" href="{{ route('hasiltanis.index') }}">Hasil Tani</a></li>
                        @endrole
                        @role('Users')
                        <li><a class="nav-link" href="{{ route('hasiltanis.index') }}">Hasil Tani</a></li>
                        @endrole
                        <li><a class="nav-link" href="{{ url('/logout') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                                <img src="{{ asset('asset/gambar/user.png') }}" width="24" class=" d-inline-block align-top" alt=""></a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- JavaScripts============================================= -->
    @include('layouts.script')
    <!-- Grafik============================================= -->
    @yield('chart')
    <!-- Footer============================================= -->
    @include('layouts.footer')
</body>

</html>