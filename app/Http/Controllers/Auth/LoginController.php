<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Default redirect after login (overridden in authenticated() method).
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Override the authenticated method to handle 2FA redirect logic.
     */
    protected function authenticated(Request $request, $user)
    {
        // If user has not yet enabled 2FA
        if (empty($user->google2fa_secret)) {
            return redirect()->route('2fa.setup');
        }

        // If 2FA is enabled but not yet verified in this session
        if (!Session::get('2fa_verified')) {
            return redirect()->route('2fa.verify');
        }

        // Proceed to home or intended destination
        return redirect()->intended($this->redirectTo);
    }
    public function logout(Request $request)
    {
        Session::forget('2fa_verified');

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
