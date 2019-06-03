<?php

namespace App\Middleware;

use Crudch\Http\Request;
use Crudch\Middleware\MiddlewareInterface;

class GuestMiddleware implements MiddlewareInterface
{
    /**
     * @param Request  $request
     * @param callable $next
     *
     * @return \Crudch\Http\Response|mixed
     */
    public function handle(Request $request, callable $next)
    {
        if (auth()->isUser()) {
            return redirect('/');
        }

        return $next($request);
    }
}
