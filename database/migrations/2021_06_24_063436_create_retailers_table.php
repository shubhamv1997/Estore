<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retailers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('password');
            $table->string('business_name');
            $table->string('business_address');
            $table->bigInteger('mobile_number');
            $table->bigInteger('business_phone');
            $table->string('document_name');
            $table->string('front_pic');
            $table->string('back_pic');
            $table->unsignedBigInteger('business_country');
            $table->foreign('business_country')->references('id')->on('countries');
            
            $table->unsignedBigInteger('business_city');
            $table->foreign('business_city')->references('id')->on('cities');
            $table->string('firstly_charges');
            
            $table->string('discount');
            $table->string('discount_amount')->nullable();
            $table->string('after_discount')->nullable();
            $table->string('monthly_charges');
            $table->string('approval');
            $table->string('block');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retailers');
    }
}
