<?php

namespace App\Http\Controllers\Api\Mobile\V1;

use App\Services\Api\Mobile\V1\ServiceServiceContract;

class ServiceController extends BaseController
{
    protected $serviceService;

    public function __construct(ServiceServiceContract $serviceService)
    {
        $this->serviceService = $serviceService;

        parent::__construct();
    }

    public function index()
    {
        return $this->serviceService->getAllServices();
    }
}
