<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntroductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('introduction', function (Blueprint $table) {
          $table->bigIncrements('iid')->autoIncrement();//id
          $table->string('main_img')->default("");//主图
          $table->string('name');//名称
          $table->string('name_en')->default('无');//英文名称
          $table->string('country')->default('无');//国家
          $table->string('author')->default('无');//作者
          $table->boolean('is_hot')->default(false);//热门攻略
          $table->string('describe')->default('无');//描述
          $table->string('file_src')->default('');//文件路径
          $table->string('file_name')->default('');//文件名
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
        Schema::dropIfExists('introductions');
    }
}
