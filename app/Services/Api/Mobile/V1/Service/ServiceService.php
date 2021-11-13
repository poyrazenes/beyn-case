<?php

namespace App\Services\Api\Mobile\V1\Service;

use App\Services\Api\Mobile\V1\ServiceServiceContract;
use App\Http\Resources\Api\Mobile\V1\ServiceResource;

use App\Models\Service;

use App\Support\Response\Response;
use Illuminate\Http\JsonResponse;

class ServiceService implements ServiceServiceContract
{
    protected $response;

    public function __construct()
    {
        $this->response = new Response();
    }

    public function getAllServices(): JsonResponse
    {
        $rows = Service::active()->get();

        return $this->response->setCode(200)->setStatus(true)
            ->setData(ServiceResource::collection($rows))->respond();
    }
}
