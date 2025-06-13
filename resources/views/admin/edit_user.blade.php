@extends('admin.layouts')

@section('admin.content')
<div class="container py-5" style="min-height: 55vh;">
    <h2 class="mb-4 text-center">Edit User</h2>

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="mx-auto" style="max-width: 500px;">
        @csrf
        @method('POST') {{-- Assuming updateUser is POST; change to PUT if needed --}}

        {{-- Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $user->name) }}"
                class="form-control @error('name') is-invalid @enderror"
                required
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email', $user->email) }}"
                class="form-control @error('email') is-invalid @enderror"
                required
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- Submit --}}
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update User</button>
        </div>
    </form>
</div>
@endsection
