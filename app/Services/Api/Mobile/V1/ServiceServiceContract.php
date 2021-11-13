<?php

namespace App\Services\Api\Mobile\V1;

use Illuminate\Http\JsonResponse;

interface ServiceServiceContract
{
    public function getAllServices(): JsonResponse;
}
