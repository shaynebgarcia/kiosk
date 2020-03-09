<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProcessingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_processings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('kiosk_id');
            $table->unsignedInteger('user_id');
            $table->string('temp_order_no');
            $table->unsignedInteger('stock_id');
            $table->bigInteger('qty')->default(0);
            $table->double('price', 8, 2)->default(0);
            $table->double('total', 8, 2)->nullable();
            $table->boolean('void')->default(0);
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
        Schema::dropIfExists('order_processings');
    }
}
