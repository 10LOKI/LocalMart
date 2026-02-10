<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureNotBanned
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user && $user->banned_at) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            if ($request->expectsJson()) {
                return response()->json(['message' => 'Your account has been banned.'], 403);
            }

            return redirect()->route('login')->withErrors([
                'email' => 'Your account has been banned.',
            ]);
        }

        return $next($request);
    }
}
