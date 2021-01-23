<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('mobile');
            $table->string('alternate_mobile');
            $table->string('blood_group');
            $table->string('district');
            $table->string('police_station');
            $table->string('post_office');
            $table->string('union');
            $table->string('religion');
            $table->string('weight');
            $table->string('birth_date');
            $table->dateTime('last_donation_date')->nullable();
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
        Schema::dropIfExists('user_details');
    }
}
