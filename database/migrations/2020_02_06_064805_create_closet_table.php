<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClosetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('closet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item');//アイテム名を保存するカラム
            $table->string('category');//服の種類を選択するカラム
            $table->string('season');//季節を保存するカラム
            $table->string('image_path')->nullable();//画像のパスを保存するカラム
            
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
        Schema::dropIfExists('closet');
    }
}
