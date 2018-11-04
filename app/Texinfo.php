<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texinfo extends Model
{
    protected $fillable = ["user_id", "technician_id", "wheel_pressure_and_position", "lighting_and_limensions", "car_body_condition", "cleanliness_of_salon", "driver_license", "technical_coupon", "emergency_equipment", "braking_path"];
}
