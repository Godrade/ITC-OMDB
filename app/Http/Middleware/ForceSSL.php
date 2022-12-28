<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceSSL {
    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle(Request $request, Closure $next) {
        if (!$request->secure() && in_array(env('APP_ENV'), ['stage', 'Production', 'production'])) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
