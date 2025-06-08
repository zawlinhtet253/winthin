@extends('admin.layouts')

@section('admin.content')
    <div class="container-fluid py-5">
    <main class="col-12 col-md-9 col-lg-10 p-4">
            <div class="row g-4">
                <!-- Total Users -->
                <div class="col-md-4">
                    <a href="{{ route('admin.users') }}" class="link-card">
                        <div class="card shadow-sm p-4 rounded-3 text-center">
                            <i class="fas fa-users fa-3x text-primary mb-3"></i>
                            <h5 class="card-title">Total Users</h5>
                            <p class="fs-3 text-primary">{{ $totalUsers }}</p>
                        </div>
                    </a>
                </div>

                <!-- Total Blogs -->
                <div class="col-md-4">
                    <a href="{{ route('admin.blogs') }}" class="link-card">
                        <div class="card shadow-sm p-4 rounded-3 text-center">
                            <i class="fas fa-blog fa-3x text-success mb-3"></i>
                            <h5 class="card-title">Total Blogs</h5>
                            <p class="fs-3 text-success">{{ $totalBlogs }}</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Recent Activities or Updates -->
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="mb-4">Recent Updates</h3>
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Latest Blog Post</h5>
                            <p class="card-text">{{ $latestBlogTitle }}</p>
                            <a href="{{ url('/admin/blogs') }}" class="btn btn-outline-primary">View All Blogs</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection