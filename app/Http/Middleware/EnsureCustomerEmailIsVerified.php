<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureCustomerEmailIsVerified
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->type === 'customer' && !$user->hasVerifiedEmail()) {
            return redirect()->route('verification.notice')->withErrors([
                'email' => 'يجب تأكيد البريد الإلكتروني أولًا.',
            ]);
        }

        return $next($request);
    }
}