<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Base
{
    use HasFactory;

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
}
