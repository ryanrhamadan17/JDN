<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('desc');
            $table->string('report');
            $table->enum('level', ['high', 'medium', 'low']);
            $table->enum('status', ['open', 'process', 'done', 'canceled']);
            $table->foreignId('cattask_id');
            $table->foreignId('petugas_id')->nullable();;
            $table->foreignId('pelanggan_id')->nullable();
            $table->timestamps();
            $table->foreign('cattask_id')->references('id')->on('cattasks');
            $table->foreign('petugas_id')->references('id')->on('admins');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
