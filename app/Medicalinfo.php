<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicalinfo extends Model
{
    protected $fillable = ["user_id", "doctor_id", "General_state", "temperature", "blood_pressure", "Pulse", "Alcohol_test", "result"];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
