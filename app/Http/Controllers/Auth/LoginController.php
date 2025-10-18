<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Validate the user login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            // 'g-recaptcha-response' => 'required|captcha'
        ], [], trans('dashboard.auth.login'));
    }

    protected function redirectTo()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        if ($user->canAccessDashboard()) {
            return $this->redirectTo;
        }

        return '/me';
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->type === User::CUSTOMER_TYPE && !$user->email_verified_at) {
            Auth::logout();
            $request->session()->invalidate();      // ضروري
            $request->session()->regenerateToken(); // ضروري

            return redirect()->route('verification.notice')->withErrors([
                'email' => 'يجب تأكيد البريد الإلكتروني أولًا قبل تسجيل الدخول.',
            ]);
        }

        return redirect()->intended($this->redirectTo());
    }
}
