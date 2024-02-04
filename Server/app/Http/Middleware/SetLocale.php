<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::get('locale') != null) {
            app()->setlocale(Session::get('locale'));
        } else {
            Session::put('locale', 'vi');
            app()->setlocale(Session::get('locale'));
        }
        return $next($request);
    }
}
