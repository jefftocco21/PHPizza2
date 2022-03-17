<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Applicants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('email')->nullable();
            $table->string('home_address');
            $table->string('preferred_hours_amount')->nullable();
            $table->string('commute_preference')->nullable();
            $table->string('valid_dot_card');
            $table->string('availability');
            $table->string('special_considerations');
            $table->text('usps_experience');
            $table->text('employment_history');
            $table->text('criminal_history');
            $table->text('driver_class');
            $table->text('questions_for_employer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
