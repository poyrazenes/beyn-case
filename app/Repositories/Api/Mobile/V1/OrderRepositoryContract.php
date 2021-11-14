<?php

namespace App\Repositories\Api\Mobile\V1;

use Illuminate\Http\Request;

interface OrderRepositoryContract
{
    public function createOrder(array $params);

    public function listOrders(Request $request);
}
