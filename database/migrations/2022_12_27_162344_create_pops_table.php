<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pops', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('desc');
            $table->double('lat',15, 8);
            $table->double('long',15, 8);
            $table->foreignId('catpop_id');
            $table->timestamps();

            $table->foreign('catpop_id')->references('id')->on('catpops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pops');
    }
}
