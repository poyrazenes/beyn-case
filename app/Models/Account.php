<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Base
{
    use HasFactory;

    protected $fillable = ['user_id', 'balance'];

    protected $casts = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
