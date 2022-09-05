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
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_game', 50)->nullable();
            $table->date('date_game')->nullable();
            $table->string('result_game', 30)->nullable();
            $table->string('parcial_game', 100)->nullable();
            $table->string('position_game', 50)->nullable();
            $table->integer('dpA')->nullable();
            $table->integer('pA')->nullable();
            $table->integer('nA')->nullable();
            $table->integer('dnA')->nullable();
            $table->integer('neuA')->nullable();
            $table->integer('dpR')->nullable();
            $table->integer('pR')->nullable();
            $table->integer('nR')->nullable();
            $table->integer('dnR')->nullable();
            $table->integer('neuR')->nullable();
            $table->integer('dpB')->nullable();
            $table->integer('pB')->nullable();
            $table->integer('nB')->nullable();
            $table->integer('dnB')->nullable();
            $table->integer('dpS')->nullable();
            $table->integer('pS')->nullable();
            $table->integer('nS')->nullable();
            $table->integer('dnS')->nullable();
            $table->integer('neuS')->nullable();
            $table->integer('dpD')->nullable();
            $table->integer('pD')->nullable();
            $table->integer('nD')->nullable();
            $table->integer('dnD')->nullable();
            $table->integer('neuD')->nullable();
            $table->integer('dpC')->nullable();
            $table->integer('pC')->nullable();
            $table->integer('nC')->nullable();
            $table->integer('dnC')->nullable();
            $table->integer('neuC')->nullable();
            $table->bigInteger('player_id')->unsigned();
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
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
        Schema::dropIfExists('games');
    }
};
