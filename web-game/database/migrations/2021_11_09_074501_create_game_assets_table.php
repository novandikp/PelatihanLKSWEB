<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_assets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('game_id')->nullable()->unsigned();
            $table->string('path');
            $table->boolean('featured_image');
            $table->foreign('game_id')->references('id')
                ->on('games')->onUpdate("cascade");
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
        Schema::dropIfExists('game_assets');
    }
}
