<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-custom shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo/WinThinLogo.png') }}" alt="Logo" height="30" class="me-2 bg-light rounded-circle">
                    <span>Win Consulting Limited</span>
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
                        <!-- <li class="nav-item"><a class="nav-link" href="{{ url('/our-activities') }}">Our Activities</a></li>  -->
                        <li class="nav-item"><a class="nav-link" href="{{ url('/career') }}">Career</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
        <footer>

        </footer>
    </div>
</body>
</html>