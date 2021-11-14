<?php

namespace App\Http\Requests\Api\Mobile\V1;

class OrderRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'car_id' => 'required|exists:cars,id',
            'service_id' => 'required|exists:services,id'
        ];
    }

    public function attributes()
    {
        return [
            'car_id' => 'Car',
            'service_id' => 'Service'
        ];
    }
}
