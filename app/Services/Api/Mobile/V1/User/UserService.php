<?php

namespace App\Services\Api\Mobile\V1\User;

use App\Http\Resources\Api\Mobile\V1\ProfileResource;
use App\Services\Api\Mobile\V1\UserServiceContract;
use App\Support\Response\Response;

class UserService implements UserServiceContract
{
    protected $response;

    public function __construct()
    {
        $this->response = new Response();
    }

    public function getProfile()
    {
        return $this->response->setCode(200)->setStatus(true)
            ->setData(new ProfileResource(api_user()))->respond();
    }

    public function updateBalance($data)
    {
        api_user()->account->update($data);

        return $this->response->setCode(200)
            ->setStatus(true)->respond();
    }
}
