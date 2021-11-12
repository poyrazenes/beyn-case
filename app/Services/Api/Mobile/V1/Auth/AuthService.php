<?php

namespace App\Services\Api\Mobile\V1\Auth;

use App\Services\Api\Mobile\V1\AuthServiceContract;

use App\Support\Response\Response;

class AuthService implements AuthServiceContract
{
    protected $response;

    public function __construct()
    {
        $this->response = new Response();
    }

    public function login($credentials)
    {
        if (!$token = auth('api')->attempt($credentials)) {
            return $this->response->setCode(401)->setStatus(false)
                ->setMessage('Authentication failed')->respond();
        }

        return $this->response->setCode(200)->setStatus(true)
            ->setMessage('Successful Operation')
            ->setData(['token' => $token])->respond();
    }
}
