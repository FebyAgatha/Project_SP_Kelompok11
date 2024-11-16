<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class VerifySessionFingerprint
{
    public function generateFingerprint() {
        $ip = request()->ip();
        $userAgent = request()->header('User-Agent');
        return hash('sha256', $ip . $userAgent);
    }

    protected function authenticated(Request $request, $user)
    {
        $fingerprint = $this->generateFingerprint();
        Session::put('user_fingerprint', $fingerprint);
    }

    public function handle($request, Closure $next)
    {
        $storedFingerprint = Session::get('user_fingerprint');
        $currentFingerprint = $this->generateFingerprint();

        if ($storedFingerprint !== $currentFingerprint) {
            // Logout and redirect if fingerprints do not match
            auth()->logout();
            Session::flush();
            return redirect('/login')->withErrors('Session expired or invalid. Please log in again.');
        }

        return $next($request);
    }
}

