<?php

namespace App\Http\Controllers\Api\Mobile\V1;

use App\Http\Requests\Api\Mobile\V1\Auth\LoginRequest;
use App\Services\Api\Mobile\V1\AuthServiceContract;

class AuthController extends BaseController
{
    protected $authService;

    public function __construct(AuthServiceContract $authService)
    {
        $this->authService = $authService;

        parent::__construct();
    }

    public function login(LoginRequest $request)
    {
        return $this->authService->login($request->validated());
    }
}
