@php
use App\Models\Category;
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Win Thin & Associates') }}</title>

    <!-- Fonts and Icons -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('app.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            background-color: #f5f5f5;
        }
        .navbar-custom {
            background-color: #003380;
        }
        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand {
            color: white;
        }
        .navbar-custom .nav-link:hover {
            color: #FFD700;
        }
        .footer-custom {
            background-color: #003380;
            color: white;
            padding: 2rem 0;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-custom shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo/WinThinLogo.png') }}" alt="Logo" height="30" class="me-2 bg-light rounded-circle">
                    <span>Win Thin & Associates</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right Side Links -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/about-us') }}">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/services') }}">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/our-teams') }}">Our Teams</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/contact-us') }}">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/career') }}">Career</a></li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="insightsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Insights
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="insightsDropdown">
                                <li>
                                    <a class="dropdown-item {{ empty($selectedCategoryId ?? null) ? 'active' : '' }}" href="{{ url('insights') }}">
                                        All Categories
                                    </a>
                                </li>
                                @foreach($categories as $category)
                                    <li>
                                        <a class="dropdown-item {{ (isset($selectedCategoryId) && (int)$selectedCategoryId === $category->id) ? 'active' : '' }}"
                                           href="{{ url('insights?category_id=' . $category->id) }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
<!-- 
                        <li class="nav-item"><a class="nav-link" href="{{ url('/wcl') }}">WCL</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>

        <main class="" style="background-color: white;">
            @yield('content')
        </main>

        <footer class="footer-custom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center mb-4 mb-md-0">
                        <img src="{{ asset('images/logo/WinThinLogo.png') }}" alt="Logo" height="50" class="me-3 bg-light rounded-circle">
                        <span class="fs-4">Win Thin & Associates</span>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h5><b>GET IN TOUCH</b></h5>
                        <p class="mt-3 mb-1">Office: Room No. 2B/2C, No. 182/194, 1st Floor, Rose Condo, Botahtaung Pagoda Rd, Pazundaung, Yangon, Myanmar 11171</p>
                        <p class="mb-1">Head Office: Naing Group Sule Tower II, No. 164/170, Room (E,F,G), 7th Floor, Sule Rd, Kyauktada, Yangon, Myanmar</p>
                        <p>Email: <a href="mailto:info@winthinassociates.com" class="text-white text-decoration-underline">info@winthinassociates.com</a></p>
                        <p>Phone: +951201798, +959972749187</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</body>

</html>
