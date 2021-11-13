<?php

namespace App\Services\Api\Mobile\V1;

use Illuminate\Http\Request;

interface CarServiceContract
{
    public function searchByParams(Request $request);
}
