<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ActiveBuyer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('MasterUser')->user()->Buyer->IS_ACTIVE == 1) {
            return $next($request);
        }
        return redirect()->back()->withErrors([
            'message' => 'Your artist account is inactive, please contact admin to reactivate your account',
        ]);
    }
}
