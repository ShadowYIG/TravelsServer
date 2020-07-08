<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScenicImgListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scenic__img__lists', function (Blueprint $table) {
            $table->bigIncrements('img_id')->autoIncrement();
            $table->unsignedInteger('scenic_sid');
            $table->string('img_src');//建议
            $table->foreign('scenic_sid')->references('sid')->on('scenic')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('scenic__img__lists');
    }
}
