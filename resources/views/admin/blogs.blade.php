@extends('admin.layouts')
@section('admin.content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        {{ $articles->links() }} 
        <a href="{{ url('/articles/add') }}" class="btn btn-primary mb-3" >
            Add Blog
            <i class="fa-solid fa-plus">
            </i>
        </a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Title</td>
                    <td>Body</td>
                    <td>Author</td>
                    <td>Categories</td>
                    <td class="text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{!! $article->body !!}</td>
                        <td>{{ $article->author }}</td>
                        <td>{{ $article->category->name }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <form action="{{ url("articles/$article->id") }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> 
                                    </button>
                                </form>

                                <form action="{{ url("articles/edit/$article->id") }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
        </table>
    </div>
@endsection