<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // caso o usuario esteja logado e nao for assinante este é redirecionado para o checkout, caso for vai para pagina premiun
        if ($request->user() && !$request->user()->subscribed('default'))
            return redirect()->route('subscriptions.checkout');

        return $next($request);
    }
}
