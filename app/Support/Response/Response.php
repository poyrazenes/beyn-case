<?php

namespace App\Support\Response;

use Illuminate\Http\JsonResponse;

class Response
{
    private $response;

    /**
     * Response constructor.
     * @param int $code
     * @param boolean $status
     * @param string $message
     * @param array $data
     * @param array $meta
     */
    public function __construct(
        int $code = 200,
        bool $status = true,
        string $message = '',
        array $data = [],
        array $meta = []
    ) {
        $this->response = new \stdClass();

        $this->response->code = $code;
        $this->response->status = $status;
        $this->response->message = $message;
        $this->response->data = $data;
        $this->response->meta = $meta;
    }

    public function setCode(int $code): Response
    {
        $this->response->code = $code;
        return $this;
    }

    public function setStatus(bool $status): Response
    {
        $this->response->status = $status;
        return $this;
    }

    public function setMessage(string $message): Response
    {
        $this->response->message = $message;
        return $this;
    }

    public function setData($data): Response
    {
        $this->response->data = $data;
        return $this;
    }

    public function setMeta($meta): Response
    {
        $this->response->meta = array_merge(
            $this->response->meta, $meta
        );

        return $this;
    }

    public function respond(): JsonResponse
    {
        return response()->json(
            $this->response,
            $this->response->code
        );
    }

    public function respondAsObject(): \stdClass
    {
        return $this->response;
    }
}
