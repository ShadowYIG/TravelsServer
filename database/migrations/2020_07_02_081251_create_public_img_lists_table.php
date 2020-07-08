<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicImgListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_img_lists', function (Blueprint $table) {
            $table->bigIncrements('img_id')->autoIncrement();
            $table->string('img_src');
            $table->string('type');
            $table->string('name');
            $table->string('extension');
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
        Schema::dropIfExists('public_img_lists');
    }
}
