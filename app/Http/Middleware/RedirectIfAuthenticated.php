<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }
        $secure = json_encode([
            'secure' => $request->secure(),
            'ip' => $request->ip(),
            'agente' => $request->userAgent(),
            'user' => $request->user(),
            'path' => $request->path(),
            'route' => $request->session()
        ]);
        Log::channel('main')->info('acessou a pagina login '.$secure);
        return $next($request);
    }
}
