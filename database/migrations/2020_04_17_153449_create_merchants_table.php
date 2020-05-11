<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('contact_no');
            $table->text('address');
            $table->string('shop_name');
            $table->string('document');
            $table->text('delivery_permission');
            $table->string('latitude1');
            $table->string('longitude1');
            $table->string('latitude2');
            $table->string('longitude2');
            $table->string('latitude3');
            $table->string('longitude3');
            $table->string('latitude4')->nullable();
            $table->string('longitude4')->nullable();
            $table->string('latitude5')->nullable();
            $table->string('longitude5')->nullable();
            $table->string('latitude6')->nullable();
            $table->string('longitude6')->nullable();
            $table->string('latitude7')->nullable();
            $table->string('longitude7')->nullable();
            $table->string('latitude8')->nullable();
            $table->string('longitude8')->nullable();
            $table->string('latitude9')->nullable();
            $table->string('longitude9')->nullable();
            $table->string('latitude10')->nullable();
            $table->string('longitude10')->nullable();
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
        Schema::dropIfExists('merchants');
    }
}
