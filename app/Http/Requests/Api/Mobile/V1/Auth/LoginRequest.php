<?php

namespace App\Http\Requests\Api\Mobile\V1\Auth;

use App\Http\Requests\Api\Mobile\V1\BaseRequest;

class LoginRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|max:250',
            'password' => 'required|max:50',
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'Email',
            'password' => 'Password',
        ];
    }
}
