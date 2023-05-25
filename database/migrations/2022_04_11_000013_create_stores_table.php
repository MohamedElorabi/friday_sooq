<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('first_name');
            $table->text('last_name');
            $table->text('description');
            $table->text('avatar');
            $table->text('cover');
            $table->text('address');
            $table->text('coordinates');
            $table->text('phone');
            $table->text('website');
            $table->text('facebook');
            $table->text('twitter');
            $table->text('instagram');
            $table->text('snapchat');
            $table->text('youtube');
            $table->text('latitude');
            $table->text('Longitude');
            $table->bigInteger('user_id');
            $table->bigInteger('type_id');
            $table->bigInteger('status')->default(0);
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
        Schema::dropIfExists('stores');
    }
}
