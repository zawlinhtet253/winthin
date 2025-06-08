@extends('admin.layouts')

@section('admin.content')
    <div class="container py-5">
        {{ $jobPosts->links() }}
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

        <a href="{{ url('/admin/careers/add') }}" class="btn btn-primary mb-3">
            Add Career
            <i class="fa-solid fa-plus"></i>
        </a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Body</td>
                    <td class="text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobPosts as $jobPost)
                    <tr>
                        <td>{{ $jobPost->id }}</td>
                        <td>{!! $jobPost->body !!}</td>
                        <td class="text-center">
                            <div class="d-flex gap-2 justify-content-center">
                                <form action="{{ url("admin/careers/$jobPost->id") }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                                <form action="{{ url("admin/careers/edit/$jobPost->id") }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
