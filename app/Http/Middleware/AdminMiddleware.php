<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return RedirectResponse|mixed|Response
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if ($request->user() && $request->user()->email === 'admin@gmail.com') {
            return $next($request);
        }

        return redirect()->route('login');
    }
}
