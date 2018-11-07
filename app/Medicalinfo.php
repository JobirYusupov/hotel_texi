<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicalinfo extends Model
{
    protected $fillable = ["user_id", "doctor_id", "General_state", "temperature", "blood_pressure", "Pulse", "Alcohol_test", "result"];
}
