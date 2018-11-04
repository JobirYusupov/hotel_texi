<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('image');
            $table->string('phone_number');
            $table->string('inn');
            $table->string('bank_name');
            $table->string('card_number');
            $table->string('card_expiration_date');
            $table->string('bank_account_number');
            $table->string('certificate_serial_number'); // seria nomeri
            $table->string('certified_date'); //haydovchilik guvohnomasini berilgan payti
            $table->string('certificate_expiration_date'); //haydovchilik guvohnomasini tugash payti
            $table->string('License_ownership_information');//litsenziya egalik malumotlari
            $table->string('Validity_of_the_license'); // litsenziya amal qilish muddati
            $table->unsignedInteger('car_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
