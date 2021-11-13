<?php

namespace App\Services\Api\Mobile\V1;

use Illuminate\Http\JsonResponse;

interface AuthServiceContract
{
    public function login(array $credentials): JsonResponse;
}
