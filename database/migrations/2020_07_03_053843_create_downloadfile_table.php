<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDownloadfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downloadfile', function (Blueprint $table) {
          $table->bigIncrements('did')->autoIncrement();//id
          $table->string('file_src');
          $table->string('name');//名称
          $table->string('token');
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
        Schema::dropIfExists('downloadfile');
    }
}
