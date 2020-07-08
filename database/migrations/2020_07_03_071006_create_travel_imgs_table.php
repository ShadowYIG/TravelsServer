<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_imgs', function (Blueprint $table) {
          $table->bigIncrements('img_id')->autoIncrement();
          $table->unsignedInteger('travels_tid');
          $table->string('img_src');//建议
          $table->foreign('travels_tid')->references('sid')->on('scenic')->onUpdate('cascade')->onDelete('cascade');
          $table->dateTime('created_at');//创建时间
          $table->dateTime('updated_at');//最后修改时间
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travel_imgs');
    }
}
