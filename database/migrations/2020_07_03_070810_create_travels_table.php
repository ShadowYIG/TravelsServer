<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
          $table->bigIncrements('tid')->autoIncrement();//id
          $table->string('main_img')->default("");//主图
          $table->string('name');//名称
          $table->integer('play_time');//游玩时长
          $table->string('start_date');//出发时间
          $table->string('city')->default("");//城市
          $table->string('channel')->default("");//途径
          $table->string('trip')->default("");//行程
          $table->longText('detail')->default('无');//详细
          $table->unsignedInteger('users_uid');
          $table->foreign('users_uid')->references('uid')->on('users')->onUpdate('cascade');//创建者id
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
        Schema::dropIfExists('travels');
    }
}
