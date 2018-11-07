<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texinfo extends Model
{
    protected $fillable = ["user_id", "technician_id", "wheel_pressure_and_position", "lighting_and_limensions", "car_body_condition", "cleanliness_of_salon", "driver_license", "technical_coupon", "emergency_equipment", "braking_path", "result"];

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
