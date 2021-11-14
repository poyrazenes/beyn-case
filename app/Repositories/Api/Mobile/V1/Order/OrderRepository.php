<?php

namespace App\Repositories\Api\Mobile\V1\Order;

use App\Models\Order;
use App\Repositories\Api\Mobile\V1\OrderRepositoryContract;
use Illuminate\Http\Request;

class OrderRepository implements OrderRepositoryContract
{
    public function __construct()
    {
        //
    }

    public function createOrder(array $params)
    {
        Order::create($params);
    }

    public function listOrders(Request $request)
    {
        $rows = Order::with(['car', 'service'])->filterUser();

        if ($request->filled('service_id')) {
            $rows->where(
                'service_id',
                $request->input('service_id')
            );
        }

        if ($request->filled('car_id')) {
            $rows->where(
                'car_id',
                $request->input('car_id')
            );
        }

        /*
         * I know this way but i think this way is not as readable as i used...
         *

        $rows->when(empty($params['service_id']), function ($query) use ($params) {
            $query->where('service_id', $params['service_id']);
        });

        $rows->when(empty($params['car_id']), function ($query) use ($params) {
            $query->where('car_id', $params['car_id']);
        });

        */

        return $rows->paginate(50);
    }
}
