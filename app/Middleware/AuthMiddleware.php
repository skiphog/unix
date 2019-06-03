<?php

namespace App\Middleware;

use Crudch\Http\Request;
use Crudch\Middleware\MiddlewareInterface;

/**
 * Class AuthMiddleware
 *
 * @package App\Middleware
 */
class AuthMiddleware implements MiddlewareInterface
{
    /**
     * @param Request  $request
     * @param callable $next
     *
     * @return \Crudch\Http\Response|mixed
     */
    public function handle(Request $request, callable $next)
    {
        if (auth()->isGuest()) {
            return redirect('/login');
        }

        return $next($request);
    }
}
