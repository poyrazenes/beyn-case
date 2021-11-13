<?php

namespace App\Http\Controllers\Api\Mobile\V1;

use App\Http\Requests\Api\Mobile\V1\BalanceRequest;
use App\Services\Api\Mobile\V1\UserServiceContract;

class UserController extends BaseController
{
    protected $userService;

    public function __construct(UserServiceContract $userService)
    {
        $this->userService = $userService;

        parent::__construct();
    }

    public function profile()
    {
        return $this->userService->getProfile();
    }

    public function updateBalance(BalanceRequest $request)
    {
        return $this->userService->updateBalance(
            $request->validated()
        );
    }
}
