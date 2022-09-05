<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_type', 50)->nullable();
            $table->string('gender', 30)->nullable();
            $table->integer('year')->nullable();
            $table->string('position', 30)->nullable();
            $table->string('type_championship', 100)->nullable();
            $table->string('team_dep', 50)->nullable();
            $table->bigInteger('entrenador_id')->unsigned();
            $table->foreign('entrenador_id')->references('id')->on('entrenadors')->onDelete('cascade');
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
        Schema::dropIfExists('records');
    }
};
