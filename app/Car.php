<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected  $fillable = ['brand', 'model', 'release_date', 'color', 'car_number', 'order_type', 'insurance_company_name', 'insurance_expiration_date'];


    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function images()
    {
        return $this->hasMany(Carimage::class);
    }
}
