@extends('admin.layouts')

@section('admin.content')
<div class="container py-5" style="max-width: 600px;">
    <h2 class="mb-4 text-center">Edit Category</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ url('/admin/categories/update/' . $category->id) }}">
        @csrf
        @method('POST') {{-- Use PUT if you prefer RESTful style --}}

        {{-- Category Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $category->name) }}"
                class="form-control @error('name') is-invalid @enderror"
                required
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Submit --}}
        <div class="text-center">
            <button type="submit" class="btn btn-success px-4">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
