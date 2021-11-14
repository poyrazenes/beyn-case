<?php

namespace App\Http\Controllers\Api\Mobile\V1;

use App\Services\Api\Mobile\V1\OrderServiceContract;
use App\Http\Requests\Api\Mobile\V1\OrderRequest;

use Illuminate\Http\Request;

class OrderController extends BaseController
{
    protected $orderService;

    public function __construct(OrderServiceContract $orderService)
    {
        $this->orderService = $orderService;

        parent::__construct();
    }

    public function index(Request $request)
    {
        return $this->orderService->list($request);
    }

    public function store(OrderRequest $request)
    {
        return $this->orderService->create(
            $request->validated()
        );
    }
}
