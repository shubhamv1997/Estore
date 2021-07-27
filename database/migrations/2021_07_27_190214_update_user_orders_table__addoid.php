<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserOrdersTableAddoid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users_orders', function($table) {
            $table->unsignedBigInteger('order_id')->comment("Order Detail ID");
            $table->foreign('order_id')->references('id')->on('order_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_orders', function($table) {
            $table->dropColumn('order_id');
        });
    }
}
