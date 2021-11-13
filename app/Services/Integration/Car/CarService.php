<?php

namespace App\Services\Integration\Car;

use App\Services\Integration\CarServiceContract;

use App\Support\Response\Response;
use Illuminate\Support\Facades\Http;

class CarService implements CarServiceContract
{
    protected $response;

    public function __construct()
    {
        $this->response = new Response();
    }

    public function fetchCarList()
    {
        $cars = $this->fetchData();

        if (empty($cars)) {
            return [];
        }

        return $cars['RECORDS'];
    }

    public function fetchData()
    {
        $response = Http::get('https://static.novassets.com/automobile.json');

        if ($response->failed()) {
            return [];
        }

        return json_decode(
            $response->body(),
            true
        );
    }
}
