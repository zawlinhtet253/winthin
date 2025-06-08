@extends('admin.layouts')

@section('admin.content')
<div class="container py-5" style="max-width: 600px;">
    <h2 class="mb-4 text-center">Add Category</h2>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error Message --}}
    @if ($errors->any())
        <div class="alert alert-danger text-center">
            {{ $errors->first() }}
        </div>
    @endif

    {{-- Add Category Form --}}
    <form action="{{ url('/admin/categories/store') }}" method="POST">
        @csrf

        {{-- Name Field --}}
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror"
                required
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Submit --}}
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-4">
                Add Category
            </button>
        </div>
    </form>
</div>
@endsection
