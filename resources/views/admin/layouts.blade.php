@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="min-height: 55vh;">
    <div class="row g-0">
        <!-- Sidebar -->
        <nav class="col-12 col-md-3 col-lg-2 bg-light border-end">
    <h1 class="h4 px-3 text-center text-primary py-4">
        Admin Panel
    </h1>
    <div class="list-group">
        <a href="{{ url('/admin/') }}" class="list-group-item list-group-item-action border-0 py-3 text-center hover-effect">
            <i class="fas fa-tachometer-alt me-2"></i>
            <span class="d-none d-sm-inline">Home</span>
        </a>
        <a href="{{ url('/admin/users') }}" class="list-group-item list-group-item-action border-0 py-3 text-center hover-effect">
            <i class="fas fa-users me-2"></i>
            <span class="d-none d-sm-inline">Users</span>
        </a>
        <a href="{{ url('/admin/blogs') }}" class="list-group-item list-group-item-action border-0 py-3 text-center hover-effect">
            <i class="fa-solid fa-book me-2"></i>
            <span class="d-none d-sm-inline">Blogs</span>
        </a>
        <a href="{{ url('/admin/careers') }}" class="list-group-item list-group-item-action border-0 py-3 text-center hover-effect">
            <i class="fa-solid fa-briefcase me-2"></i>
            <span class="d-none d-sm-inline">Carreer</span>
        </a>
        <a href="{{ url('/admin/categories') }}" class="list-group-item list-group-item-action border-0 py-3 text-center hover-effect">
            <i class="fa-solid fa-book me-2"></i>
            <span class="d-none d-sm-inline">Categories</span>
        </a>
        <form method="POST" action="{{ route('logout') }}" class="text-center">
            @csrf
            <button type="submit" class="list-group-item list-group-item-action border-0 py-3 text-danger bg-transparent w-100 text-center">
                <i class="fas fa-sign-out-alt me-2"></i>
                <span class="d-none d-sm-inline">Logout</span>
            </button>
        </form>
    </div>
</nav>


        <!-- Main Content -->
        <main class="col-12 col-md-9 col-lg-10 p-4">
            @yield('admin.content')
        </main>
    </div>
</div>
@endsection
