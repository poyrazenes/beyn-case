<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Base
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'service_id',
        'car_id', 'price'
    ];

    protected $casts = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function scopeUser($query)
    {
        return $query->where('user_id', api_user()->id);
    }
}
