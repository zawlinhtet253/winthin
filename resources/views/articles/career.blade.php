@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($jobPosts as $jobPost )
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{$jobPost->title}}</h5>
                            <small class="text-muted">{{ $jobPost->created_at->format('M d, Y') }}</small>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{ $jobPost->body}}
                            </p>
                            <a href="{{ route('career.detail', $jobPost->id) }}">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection