<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScenicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scenic', function (Blueprint $table) {
            $table->bigIncrements('sid')->autoIncrement();//id
            $table->string('main_img')->default("");//主图
            $table->string('name');//名称
            $table->boolean('is_hot')->default(false);//热门景点
            $table->integer('play_time')->default('0');//游玩时长
            $table->integer('recommend_time_s')->default('1');//推荐时间开始
            $table->integer('recommend_time_e')->default('12');//推荐时间结束
            $table->string('describe')->default('无');//描述
            $table->string('proposal')->default('无');//建议
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
        Schema::dropIfExists('scenic');
    }
}
