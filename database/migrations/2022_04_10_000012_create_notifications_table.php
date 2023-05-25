<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('value_ar');
            $table->text('value_en');
            $table->text('name_ur');
            $table->text('name_hi');
            $table->text('name_fil');
            $table->bigInteger('user_id');
            $table->bigInteger('sender_id')->nullable();
            $table->enum('type',['ad','user','comment','message','store']);
            $table->string('image');
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
        Schema::dropIfExists('notifications');
    }
}
