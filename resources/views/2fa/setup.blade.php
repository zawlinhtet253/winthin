@extends('layouts.app')

@section('content')
<div class="container py-5 text-center">
    <h2>Enable Google 2FA</h2>

    <p>Scan the QR code below with your Google Authenticator app:</p>

    {!! $QR_Image !!}

    <form method="POST" action="{{ route('2fa.enable') }}">
        @csrf
        <div class="form-group mt-3">
            <label for="code">Enter the 6-digit code</label>
            <input type="text" name="code" class="form-control w-25 mx-auto text-center" required>
        </div>
        <button class="btn btn-primary mt-2">Enable 2FA</button>
    </form>
</div>
@endsection
