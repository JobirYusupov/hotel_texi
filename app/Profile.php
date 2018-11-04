<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id', 'image', 'phone_number', 'inn', 'bank_name', 'card_number', 'card_expiration_date', 'bank_account_number', 'certificate_serial_number', 'certified_date', 'certificate_expiration_date', 'License_ownership_information', 'Validity_of_the_license', 'car_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
