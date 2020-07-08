<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('uid')->autoIncrement();//id
            $table->string('name');//用户名
            $table->string('password');//密码
            $table->string('email');//邮箱
            $table->string('phone')->nullable();//手机号
            $table->string('avatar_src')->nullable();//头像链接
            $table->integer('travel_count')->default(0);//发布游记数量
            $table->boolean('is_admin')->default(false);//是否管理
            $table->integer('admin_level')->default(0);//用户等级
            $table->string('remember_token')->nullable();
            $table->dateTime('last_login')->nullable();//最后登录时间
            $table->dateTime('created_at');//注册时间
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
        Schema::dropIfExists('users');
    }
}
