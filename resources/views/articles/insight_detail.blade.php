@extends('layouts.app')

@section('content')
<div class="container py-4" style="min-height: 50vh;">
    <article class="blog-post">
        <h1 class="blog-post-title">{{ $article->title }}</h1>
        
        <p class="article-post-meta text-muted">
            Posted on {{ $article->created_at->format('F j, Y') }}
            @if($article->updated_at->gt($article->created_at))
                <br>Last updated on {{ $article->updated_at->format('F j, Y') }}
            @endif
        </p>
        
        <hr>
        
        <div class="article-post-content align-left">
            {!! $article->body !!}
        </div>
        
        
        <div>
            <h3>
                
            </h3>
        </div>
    </article>
    
    <div class="mt-4">
        <a href="{{ route('articles.insights') }}" class="btn btn-outline-primary">
            ← Back to All Posts
        </a>
    </div>
</div>
@endsection