<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('education_id');
            $table->unsignedBigInteger('game_id');
            $table->timestamps();

            $table->foreign('education_id')->references('id')->on('educations')->onDelete('cascade');
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_games');
    }
}
