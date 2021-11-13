<?php

namespace App\Services\Api\Mobile\V1;

use Illuminate\Http\JsonResponse;

interface UserServiceContract
{
    public function getProfile(): JsonResponse;

    public function updateBalance(array $data): JsonResponse;
}
