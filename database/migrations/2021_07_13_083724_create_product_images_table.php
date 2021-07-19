<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment("Admin ID");
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('product_id')->comment("Product ID");
            $table->foreign('product_id')->references('id')->on('products');  
            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3');
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
        Schema::dropIfExists('product_images');
    }
}
