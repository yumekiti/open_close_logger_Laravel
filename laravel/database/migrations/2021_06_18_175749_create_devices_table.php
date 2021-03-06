<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->timestamps();

            //ユニークでかぶりなしのトークン
            $table->string('token', 128)->unique()->nullable()->default(null);
            $table->string('device_name', 30);

            $table->integer('category_main')->default(0);

            //外部キー制約
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
