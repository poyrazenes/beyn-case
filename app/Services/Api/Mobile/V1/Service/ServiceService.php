<?php

namespace App\Services\Api\Mobile\V1\Service;

use App\Http\Resources\Api\Mobile\V1\ServiceResource;
use App\Models\Service;
use App\Services\Api\Mobile\V1\ServiceServiceContract;

use App\Http\Resources\Api\Mobile\V1\ProfileResource;
use App\Support\Response\Response;

class ServiceService implements ServiceServiceContract
{
    protected $response;

    public function __construct()
    {
        $this->response = new Response();
    }

    public function getAllServices()
    {
        $rows = Service::active()->get();

        return $this->response->setCode(200)->setStatus(true)
            ->setData(ServiceResource::collection($rows))->respond();
    }
}
