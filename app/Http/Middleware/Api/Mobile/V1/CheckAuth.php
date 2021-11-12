<?php

namespace App\Http\Middleware\Api\Mobile\V1;

use App\Support\Response\Response;

use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

use Illuminate\Http\Request;

use Closure;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = new Response();

        try {
            JWTAuth::parseToken()->authenticate();
        } catch (TokenInvalidException $exception) {
            return $response->setCode(401)->setStatus(false)
                ->setMessage('Invalid Token')->respond();
        } catch (TokenExpiredException $exception) {
            return $response->setCode(401)->setStatus(false)
                ->setMessage('Expired Token')->respond();
        } catch (\Throwable $exception) {
            return $response->setCode(400)->setStatus(false)
                ->setMessage('Token Not Found')->respond();
        }

        return $next($request);
    }
}
