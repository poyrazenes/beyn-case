<?php

namespace App\Http\Controllers\Api\Mobile\V1;

use App\Services\Api\Mobile\V1\CarServiceContract;
use Illuminate\Http\Request;

class CarController extends BaseController
{
    protected $carService;

    public function __construct(CarServiceContract $carService)
    {
        $this->carService = $carService;

        parent::__construct();
    }

    public function index(Request $request)
    {
        return $this->carService->searchByParams($request);
    }
}
