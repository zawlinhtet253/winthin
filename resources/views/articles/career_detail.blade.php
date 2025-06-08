@extends('layouts.app')

@section('content') 
    <div class="container">
        <div class="row">
            <div class="col-5 mt-4">
                <p class="text-muted">{{ $jobPost->created_at->format('M d, Y') }} | Career</p>
                <h1>{{$jobPost->title}}</h1>
            </div>
            <div class="col-7 mt-5">
                <div>
                    <h4>Description</h4>
                    <p class="w-75 fs-4">{{$jobPost->description}}</p>
                </div>
                <div>
                    <h4 class="mt-3">Job Requirements</h4>
                    <p class="w-75 fs-4">{{$jobPost->job_requirements}}</p>
                </div>
                <div>
                    <h4 class="mt-3">Other</h4>
                    <p class="w-75 fs-4">{{$jobPost->job_requirements}}</p>
                </div>
                <div>
                    <p class="fs-4">admin.hr@winthinassociates.com</p>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <a href="{{ route('articles.career') }}" class="btn btn-outline-primary">
                ← Back to All Posts
            </a>
        </div>
    </div>
@endsection