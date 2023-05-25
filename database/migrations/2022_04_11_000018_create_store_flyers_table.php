<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreFlyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_flyers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name_ar');
            $table->text('name_en');
            $table->text('name_ur');
            $table->text('name_hi');
            $table->text('name_fil');
            $table->bigInteger('store_id');
            $table->enum('type',['daily','monthly','yearly']);
            $table->date('expire_date');
            $table->text('file');
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
        Schema::dropIfExists('store_flyers');
    }
}
