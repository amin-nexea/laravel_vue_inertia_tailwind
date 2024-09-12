<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Events\Verified;
use Inertia\Inertia;

class EmailVerificationController extends Controller
{
    public function notice(Request $request)
    {
        $user = $request->user();
        if ($user instanceof MustVerifyEmail && $user->hasVerifiedEmail()) {
            return redirect()->intended('dashboard');
        }
        return Inertia::render('Auth/VerifyEmail');
    }
    public function verify(EmailVerificationRequest $request)
    {
        $user = $request->user();
        if ($user instanceof MustVerifyEmail && $user->hasVerifiedEmail()) {
            return redirect()->intended('dashboard');
        }
        if ($user->markEmailAsVerified()) {
            event(new \Illuminate\Auth\Events\Verified($user));
        }
        return redirect()->intended('dashboard')->with('verified', true);
    }
    public function send(Request $request)
    {
        $user = $request->user();
        if ($user instanceof MustVerifyEmail && $user->hasVerifiedEmail()) {
            return redirect()->intended('dashboard');
        }
        $user->sendEmailVerificationNotification();
        return back()->with('status', 'verification-link-sent');
    }
}
