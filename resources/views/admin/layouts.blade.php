<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Win Thin & Associates') }}</title>

    <!-- Fonts and Icons -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('app.css') }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
<div class="container-fluid">
    <!-- Toggle Button for small/medium screens -->
    <button class="btn btn-primary d-lg-none my-3" type="button"
        data-bs-toggle="offcanvas"
        data-bs-target="#adminSidebar"
        aria-controls="adminSidebar">
        <i class="fas fa-bars"></i> Menu
    </button>

    <div class="row">
        <!-- Sidebar Column -->
        <div class="col-lg-2 p-0">
            <!-- Offcanvas Sidebar -->
            <div class="offcanvas-lg offcanvas-start bg-light border-end vh-100" tabindex="-1" id="adminSidebar" aria-labelledby="adminSidebarLabel">
                <div class="offcanvas-header d-lg-none">
                    <h5 class="offcanvas-title text-primary" id="adminSidebarLabel">Admin Panel</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body p-0 d-flex flex-column">
                    <h5 class="text-center text-primary py-3 border-bottom d-none d-lg-block">Admin Panel</h5>

                    <!-- Controls -->
                    <div class="mb-3">
                        <small class="text-uppercase text-muted fw-bold px-4 mt-3 d-block">Controls</small>
                        <div class="list-group list-group-flush">
                            <a href="{{ url('/admin/') }}" class="list-group-item list-group-item-action px-4 py-3 d-flex align-items-center">
                                <i class="fas fa-tachometer-alt me-3"></i> Dashboard
                            </a>
                            <a href="{{ url('/admin/users') }}" class="list-group-item list-group-item-action px-4 py-3 d-flex align-items-center">
                                <i class="fas fa-users me-3"></i> Users
                            </a>
                            <a href="{{ url('/admin/blogs') }}" class="list-group-item list-group-item-action px-4 py-3 d-flex align-items-center">
                                <i class="fa-solid fa-book me-3"></i> Blogs
                            </a>
                            <a href="{{ url('/admin/careers') }}" class="list-group-item list-group-item-action px-4 py-3 d-flex align-items-center">
                                <i class="fa-solid fa-briefcase me-3"></i> Career
                            </a>
                            <a href="{{ url('/admin/categories') }}" class="list-group-item list-group-item-action px-4 py-3 d-flex align-items-center">
                                <i class="fa-solid fa-book me-3"></i> Categories
                            </a>
                        </div>
                    </div>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                        @csrf
                        <button type="submit" class="list-group-item list-group-item-action text-danger bg-transparent border-0 px-4 py-3 d-flex align-items-center">
                            <i class="fas fa-sign-out-alt me-3"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <main class="col-lg-10 p-4">
            <div class="table-responsive">
                @yield('admin.content')
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>