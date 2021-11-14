<?php

namespace App\Services\Api\Mobile\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface OrderServiceContract
{
    public function create(array $params): JsonResponse;

    public function list(Request $request): JsonResponse;
}
