<?php

namespace App\Exceptions;

use App\Support\Response\Response;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($request->wantsJson()) {
            $response = new Response();

            if ($exception instanceof NotFoundHttpException) {
                $response->setCode(404)->setMessage('Result Not Found');
            } elseif ($exception instanceof ModelNotFoundException) {
                $response->setCode(404)->setMessage('Result Not Found');
            } elseif ($exception instanceof MethodNotAllowedHttpException) {
                $response->setCode(405)->setMessage('Method Not Allowed');
            } elseif ($exception instanceof AuthenticationException) {
                $response->setCode(401)->setMessage('Unauthorized Request');
            } elseif ($exception instanceof TooManyRequestsHttpException) {
                $response->setCode(429)->setMessage('Too Many Request');
            } else {
                $response->setCode(500)->setMessage('Internal Server Error');
            }

            return $response->setStatus(false)->respond();
        }

        return parent::render($request, $exception);
    }
}
