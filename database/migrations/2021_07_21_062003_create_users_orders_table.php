<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment("Customer ID");
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('retailer_id')->comment("Retailer ID");
            $table->foreign('retailer_id')->references('id')->on('users');
            $table->unsignedBigInteger('product_id')->comment("Product ID");
            $table->foreign('product_id')->references('id')->on('products');
            
            $table->string('Quantity');
            $table->float('amount');
            $table->date('order_date');
            $table->string('status');
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
        Schema::dropIfExists('users_orders');
    }
}
