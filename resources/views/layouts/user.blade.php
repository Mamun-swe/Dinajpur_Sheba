<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>দিনাজপুর সেবা</title>
    
    <script src="{{ asset('js/app.js') }}"></script>
   
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-5 fixed-top shadow-sm">
            <a class="navbar-brand" href="{{route('buyer.products')}}">
                <img src="{{asset('images/static/logo1.png')}}" class="img-fluid">
            </a>
            <button class="navbar-toggler shadow-none rounded-0" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('buyer.products')}}">পণ্যসমূহ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('buyer.account')}}">আমার একাউন্ট</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('buyer.orders')}}">আমার অর্ডার</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            লগ আউট
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <a href="{{ url()->previous() }}" class="btn btn-info rounded-circle text-white back-btn"><i class="fas fa-chevron-left"></i></a>

        

        <main class="main">
            @yield('content')
        </main>
    </div>
</body>
</html>