<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->boolean('is_new');
            $table->boolean('is_onSale');
            $table->integer('price');
            $table->integer('sale_price')->nullable();
            $table->text('main_image');
            $table->text('second_image')->nullable();
            $table->text('third_image')->nullable();
            $table->text('tag');
            $table->string('color');
            $table->string('size');
            $table->integer('quantity');
            $table->foreignId('owner_id')
                ->unsigned()
                ->references('id')
                ->on('owner_infos')
                ->onDelete('cascade');
            $table->foreignId('category_id')
                ->unsigned()
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
