<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->string('tlp');
            $table->string('alamat');
            $table->integer('status');
            $table->double('lat',15, 8)->nullable();
            $table->double('long',15, 8)->nullable();
            $table->foreignId('paket_id');
            $table->foreignId('marketing_id');
            $table->timestamps();
            $table->foreign('paket_id')->references('id')->on('pakets');
            $table->foreign('marketing_id')->references('id')->on('marketings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggans');
    }
}
