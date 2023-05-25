<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('desc');
            $table->string('mobile')->nullable();
            $table->string('user_name')->nullable();
            $table->string('price')->default('0');
            $table->bigInteger('user_id');
            $table->bigInteger('country_id');
            $table->bigInteger('city_id');
            $table->bigInteger('town_id');
            $table->bigInteger('category_id');
            $table->bigInteger('sub_category_id');
            $table->enum('active', ['actived', 'waiting','refused','archived','sold'])->default('waiting');
            $table->enum('type', ['product', 'service'])->default('product');
            $table->boolean('special')->default(false);   
            $table->timestamp('link')->nullable();
            $table->timestamp('reason')->nullable();
            $table->boolean('whatsapp')->default(false);
            $table->boolean('call')->default(false);     
            $table->string('slug')->unique();       
            $table->timestamp('active_at')->nullable();
            $table->timestamp('special_at')->nullable();
            $table->bigInteger('special_package')->nullable();    
            $table->bigInteger('views')->default(0);         
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
        Schema::dropIfExists('ads');
    }
}
