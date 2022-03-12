<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
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
            $table->foreignId('order_id')
            ->unsigned()
            ->references('id')
            ->on('orders')
            ->onDelete('cascade');

            $table->foreignId('product_id')
                ->unsigned()
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->integer('quantity');
            $table->string('size');
            $table->string('color');
            $table->integer('price');
            $table->string('status')->default('Pending');
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
