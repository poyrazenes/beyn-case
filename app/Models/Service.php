<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Base
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title', 'price',
        'description', 'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
