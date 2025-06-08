@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 75vh;">
    <div class="w-100" style="max-width: 400px;">
        <h2 class="text-center mb-4">Two-Factor Authentication</h2>

        <form method="POST" action="{{ route('2fa.verify.post') }}">
            @csrf

            <div class="mb-3">
                <label for="code" class="form-label">Enter your 6-digit code</label>
                <input type="text" name="code" id="code" class="form-control text-center" required autofocus>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger text-center">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Verify</button>
            </div>
        </form>
    </div>
</div>
@endsection
