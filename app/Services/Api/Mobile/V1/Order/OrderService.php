<?php

namespace App\Services\Api\Mobile\V1\Order;

use App\Http\Resources\Api\Mobile\V1\OrderResource;
use App\Repositories\Api\Mobile\V1\OrderRepositoryContract;
use App\Services\Api\Mobile\V1\OrderServiceContract;

use App\Support\Response\Response;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderService implements OrderServiceContract
{
    protected $response;
    protected $orderRepository;

    public function __construct(OrderRepositoryContract $orderRepository)
    {
        $this->response = new Response();
        $this->orderRepository = $orderRepository;
    }

    public function create(array $params): JsonResponse
    {
        if (api_user()->balanceCheck($params['service_id'])) {
            return $this->response->setCode(400)->setStatus(false)
                ->setMessage('Balance is not enough for this service!')->respond();
        }

        $params['user_id'] = api_user()->id;

        $this->orderRepository->createOrder($params);

        return $this->response->setCode(201)
            ->setStatus(true)->respond();
    }

    public function list(Request $request): JsonResponse
    {
        $rows = $this->orderRepository->listOrders($request);

        $meta = [
            'take' => 50,
            'page' => $rows->currentPage(),
            'total' => $rows->total(),
            'page_count' => $rows->lastPage(),
        ];

        return $this->response->setCode(201)->setStatus(true)
            ->setData(OrderResource::collection($rows))->setMeta($meta)->respond();
    }
}
