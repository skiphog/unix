<?php

namespace App\Middleware;

use Crudch\Http\Request;
use Crudch\Middleware\MiddlewareInterface;

/**
 * Class AdminMiddleware
 *
 * @package App\Middleware
 */
class AdminMiddleware implements MiddlewareInterface
{
    /**
     * @param Request  $request
     * @param callable $next
     *
     * @return mixed
     * @throws \Crudch\Http\Exceptions\AbortException
     */
    public function handle(Request $request, callable $next)
    {
        if (!auth()->isAdmin()) {
            return abort(403);
        }

        return $next($request);
    }
}
