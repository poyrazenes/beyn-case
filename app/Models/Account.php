<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Base
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id', 'balance'];

    protected $casts = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
