<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment("Admin ID");
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('product_id')->comment("Product ID");
            $table->foreign('product_id')->references('id')->on('products');  
            $table->string('att_name1');
            $table->string('att_value1');
            $table->string('att_name2');
            $table->string('att_value2');
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
        Schema::dropIfExists('product_attributes');
    }
}
