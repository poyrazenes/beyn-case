<?php

namespace App\Http\Controllers\Api\Mobile\V1;

use App\Http\Controllers\Controller;

use App\Support\Response\Response;

class BaseController extends Controller
{
    protected $response;

    public function __construct()
    {
        $this->response = new Response();
    }
}
