@extends('admin.layouts')
@section('admin.content')
    <div class="container py-5">
        <h2 class="mb-4">Categories</h2>

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

        <a href="{{ url('/admin/categories/add') }}" class="btn btn-primary mb-3">
            Add Category
            <i class="fa-solid fa-plus"></i>
        </a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td class="text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="text-center">
                            <div class="d-flex gap-2 justify-content-center">

                                {{-- Edit Button --}}
                                <form action="{{ url("admin/categories/edit/$category->id") }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </form>

                                {{-- Delete Button --}}
                                <form action="{{ url("admin/categories/$category->id") }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
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
