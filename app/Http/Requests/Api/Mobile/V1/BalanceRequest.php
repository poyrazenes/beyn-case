<?php

namespace App\Http\Requests\Api\Mobile\V1;

class BalanceRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'balance' => 'required|numeric'
        ];
    }

    public function attributes()
    {
        return [
            'balance' => 'Balance'
        ];
    }
}
