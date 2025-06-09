@extends('layouts.app')

@section('content')
<div class="container py-5" style="min-height: 55vh;">
    <div class="row">
        <div class="col-lg-6 mb-4">
            <p class="text-muted">
                {{ $jobPost->created_at->format('M d, Y') }} &bull; <strong>Career</strong>
            </p>
            <h2 class="fw-bold">{{ $jobPost->title }}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <div class="mb-4">
                <h4>Description</h4>
                <p class="fs-5">{{ $jobPost->description ?? $jobPost->body }}</p>
            </div>

            <div class="mb-4">
                <h5>Email your application to:</h5>
                <p class="fs-5">admin.hr@winthinassociates.com </p>
                
            </div>

            <a href="{{ route('admin.careers') }}" class="btn btn-outline-primary">
                ← Back to All Posts
            </a>
        </div>
    </div>
</div>
@endsection
