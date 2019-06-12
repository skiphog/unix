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
        $auth = auth();

        if ($auth->isUser()) {
            return redirect('/user/' . $auth->id);
        }

        return $next($request);
    }
}
