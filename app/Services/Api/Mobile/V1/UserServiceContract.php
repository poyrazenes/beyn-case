<?php

namespace App\Services\Api\Mobile\V1;

interface UserServiceContract
{
    public function getProfile();

    public function updateBalance($data);
}
