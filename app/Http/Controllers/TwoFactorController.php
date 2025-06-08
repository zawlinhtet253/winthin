<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class TwoFactorController extends Controller
{
    public function showSetupForm()
    {
        $google2fa = app('pragmarx.google2fa'); // ✅ FIXED

        $user = Auth::user();
        $secret = $google2fa->generateSecretKey();

        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            $user->email,
            $secret
        );

        Session::put('2fa:secret', $secret);

        return view('2fa.setup', [
            'QR_Image' => $QR_Image,
        ]);
    }

    public function enable2fa(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);

        $google2fa = app('pragmarx.google2fa'); // ✅ FIXED
        $secret = Session::get('2fa:secret');

        if (!$secret) {
            return back()->withErrors(['code' => 'Secret not found. Please try again.']);
        }

        $valid = $google2fa->verifyKey($secret, $request->input('code'));

        if ($valid) {
            $user = User::find(Auth::id());
            $user->google2fa_secret = $secret;
            $user->save();

            Session::forget('2fa:secret');

            return redirect()->route('home')->with('success', 'Two-Factor Authentication enabled successfully.');
        }

        return back()->withErrors(['code' => 'Invalid verification code.']);
    }

    public function showVerifyForm()
    {
        return view('2fa.verify');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);

        $google2fa = app('pragmarx.google2fa');
        $user = Auth::user();

        $valid = $google2fa->verifyKey($user->google2fa_secret, $request->input('code'));

        if ($valid) {
            Session::put('2fa_verified', true);
            return redirect()->intended(route('admin.index')); // ✅ FIXED
        }

        return back()->withErrors(['code' => 'Invalid 2FA code.']);
    }

}
