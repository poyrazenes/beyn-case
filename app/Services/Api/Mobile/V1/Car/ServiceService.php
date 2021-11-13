<?php

namespace App\Services\Api\Mobile\V1\Car;

use App\Http\Resources\Api\Mobile\V1\CarResource;
use App\Models\Car;
use App\Models\Service;
use App\Services\Api\Mobile\V1\CarServiceContract;

use App\Support\Response\Response;
use Illuminate\Http\Request;

class ServiceService implements CarServiceContract
{
    protected $response;

    public function __construct()
    {
        $this->response = new Response();
    }

    public function searchByParams(Request $request)
    {
        $rows = Car::active();

        if ($request->filled('brand')) {
            $brand = $request->input('brand');

            $rows->where('brand', 'like', "%{$brand}%");
        }

        if ($request->filled('model')) {
            $model = $request->input('model');

            $rows->where('model', 'like', "%{$model}%");
        }

        if ($request->filled('year')) {
            $year = (int)$request->input('year');

            $rows->where('year_start', '>=', $year)
                ->where('year_end', '<=', $year);
        }

        $rows = $rows->paginate(50);

        return $this->response->setCode(200)->setStatus(true)
            ->setData(CarResource::collection($rows))->respond();
    }
}
