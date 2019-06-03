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
class ProfilerMiddleware implements MiddlewareInterface
{
    /**
     * @param Request  $request
     * @param callable $next
     *
     * @return Response|mixed
     */
    public function handle(Request $request, callable $next)
    {
        /** @var Response $response */
        $response = $next($request);

        return $response
            ->withHeaders(['Profiler-Skip-Hog' => convertBite(memory_get_usage())]);
    }
}
