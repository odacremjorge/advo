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
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_team', 50);
            $table->string('personality', 50);
            $table->date('date_creation')->nullable();
            $table->string('category_max', 50)->nullable();
            $table->string('logo', 500)->nullable();
            $table->string('manager', 50)->nullable();
            $table->string('phone_manager', 50)->nullable();
            $table->bigInteger('entrenador_id')->unsigned();
            $table->foreign('entrenador_id')->references('id')->on('entrenadors')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('teams');
    }
};
