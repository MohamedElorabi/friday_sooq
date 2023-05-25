<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name_ar');
            $table->text('name_en');
            $table->text('name_ur');
            $table->text('name_hi');
            $table->text('name_fil');
            $table->text('desc_ar');
            $table->text('desc_en');
            $table->text('desc_ur');
            $table->text('desc_hi');
            $table->text('desc_fil');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('sale_price')->nullable();
            $table->bigInteger('store_id');
            $table->bigInteger('store_category_id');
            $table->bigInteger('views');
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
        Schema::dropIfExists('store_products');
    }
}
