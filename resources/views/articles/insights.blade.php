@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center my-5">
        <h1 class="fw-bold">Insights & Articles</h1>
        <p class="text-muted">Stay informed with the latest updates and perspectives from our team.</p>
    </div>

    <div class="row g-4" style="min-height: 50vh;">
        @foreach ($articles as $article)
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm border-0 rounded-4 d-flex flex-column hover-shadow">
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-bold fs-5 text-dark">{{ $article->title }}</h5>
                        <hr class="mb-3">
                        <p class="text-muted flex-grow-1" style="min-height: 60px;">
                            {{ Str::limit(strip_tags($article->body), 120) }}
                        </p>
                    </div>
                    <div class="card-footer bg-white border-0 text-end">
                        @if(strlen($article->body) > 120)
                            <a href="{{ route('articles.insight_detail', $article->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">Read More</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
