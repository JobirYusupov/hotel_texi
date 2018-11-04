<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTexinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('texinfos', function (Blueprint $table) {
            $table->increments('id');
                $table->unsignedInteger('user_id');
            $table->unsignedInteger('technician_id');
            $table->text('wheel_pressure_and_position'); //g'ildirak bosimi va holati
            $table->text('lighting_and_limensions'); //yoritish va o'lchamlar
            $table->text('car_body_condition'); //kuzov holati
            $table->text('cleanliness_of_salon'); //salom tozaligi
            $table->text('driver_license'); //Наличия водительских прав и
            $table->text('technical_coupon'); // технического талона
            $table->text('emergency_equipment'); //favqulodda xafvsizlik johozlari borligi
            $table->string('braking_path'); //tormoz yo'li
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
        Schema::dropIfExists('texinfos');
    }
}
