<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Base
{
    use SoftDeletes;

    protected $fillable = [
        'remote_id', 'url', 'brand', 'model', 'year_start', 'year_end',
        'option', 'engine_cylinders', 'engine_displacement', 'engine_power',
        'engine_torque', 'engine_fuel_system', 'engine_fuel', 'engine_c2o',
        'performance_top_speed', 'performance_acceleration', 'fuel_economy_city',
        'fuel_economy_highway', 'fuel_economy_combined', 'transmission_drive_type',
        'transmission_gearbox', 'brakes_front', 'brakes_rear', 'tires_size',
        'dimensions_length', 'dimensions_width', 'dimensions_height',
        'dimensions_front_rear_track', 'dimensions_wheelbase', 'dimensions_ground_clearance',
        'dimensions_cargo_volume', 'dimensions_cd', 'weight_unlade', 'weight_limit', 'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function getYearAttribute()
    {
        if ($this->year_start == $this->year_end) {
            return $this->year_start;
        }

        if ($this->year_end > date('Y')) {
            return "{$this->year_start} - Present";
        }

        return "{$this->year_start} - {$this->year_end}";
    }
}
