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
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('num_reg');
            $table->string('kardex', 50);
            $table->string('name_player', 100);
            $table->string('nacionality', 50);
            $table->date('date_birth');
            $table->string('ci_player', 30);
            $table->string('category_player', 50)->nullable();
            $table->date('date_hab')->nullable();
            $table->string('picture_player', 500)->nullable();
            $table->string('condition_player', 100)->nullable();
            $table->string('gender_player', 50)->nullable();
            $table->string('city_player', 50)->nullable();
            $table->string('address_player', 50)->nullable();
            $table->string('phone_player', 50)->nullable();
            $table->string('orc_player', 30)->nullable();
            $table->string('ln_player', 30)->nullable();
            $table->string('partida_player', 30)->nullable();
            $table->string('work_player', 50)->nullable();
            $table->string('studies_player', 50)->nullable();
            $table->string('degree_player', 50)->nullable();
            $table->string('team_ant', 50)->nullable();
            $table->bigInteger('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::dropIfExists('players');
    }
};
