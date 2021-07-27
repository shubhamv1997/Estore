<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment("Customer ID");
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('retailers');
            $table->string('products_detail')->comment('price_qty_array');
            $table->string('address')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('city');
            $table->string('pincode');
            $table->string('shipping_company')->nullable();
            $table->string('tracking_id')->nullable();;
            $table->string('link')->nullable();;
            $table->boolean('local_pickup')->default(false);
            $table->boolean('is_order_shipped')->default(false);
            $table->boolean('is_order_paid')->default(false);
            $table->boolean('is_order_complete')->default(false);
            $table->boolean('is_order_reviewed')->default(false);
            $table->string('user_review')->default('')->nullable();
            $table->integer('user_star')->default(0)->nullable();
            $table->date('order_date');
            $table->string('status');
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
        Schema::dropIfExists('order_details');
    }
}
