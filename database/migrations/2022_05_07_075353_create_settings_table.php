<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('name_ar');
            $table->longText('name_en');
            $table->longText('about_us_ar');
            $table->longText('about_us_en');
            $table->longText('desc_ar');
            $table->longText('desc_en');
            $table->longText('payment_ar');
            $table->longText('payment_en');
            $table->longText('terms_ar');
            $table->longText('terms_en');
            $table->longText('usage_ar');
            $table->longText('usage_en');
            $table->longText('privacy_policy_ar');
            $table->longText('privacy_policy_en');
            $table->string('phone')->default('');
            $table->string('phone2')->default('');
            $table->string('email')->default('');
            $table->string('email2')->default('');
            $table->string('facebook')->default('');
            $table->string('twitter')->default('');
            $table->string('instagram')->default('');
            $table->string('snapchat')->default('');
            $table->string('youtube')->default('');
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
        Schema::dropIfExists('settings');
    }
}
