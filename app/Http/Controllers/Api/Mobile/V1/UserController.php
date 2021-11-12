<?php

namespace App\Http\Controllers\Api\Mobile\V1;

use App\Http\Requests\Api\Mobile\V1\Auth\LoginRequest;
use App\Http\Resources\Api\Mobile\V1\ProfileResource;
use App\Services\Api\Mobile\V1\AuthServiceContract;

class UserController extends BaseController
{
    protected $authService;

    public function __construct(AuthServiceContract $authService)
    {
        $this->authService = $authService;

        parent::__construct();
    }

    public function profile()
    {
        return $this->response->setCode(200)->setStatus(true)
            ->setData(new ProfileResource(auth('api')->user()))->respond();
    }
}
