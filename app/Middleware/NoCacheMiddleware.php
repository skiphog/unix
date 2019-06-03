<?php

namespace App\Middleware;

use Crudch\Http\Request;
use Crudch\Http\Response;
use Crudch\Middleware\MiddlewareInterface;

/**
 * Class ProfilerMiddleware
 *
 * @package App\Middleware
 */
class NoCacheMiddleware implements MiddlewareInterface
{
    /**
     * @param Request  $request
     * @param callable $next
     *
     * @return Response|mixed
     */
    public function handle(Request $request, callable $next)
    {
        header('Cache-Control: no-store;max-age=0');

        return $next($request);
    }
}
