<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('developer_id')->nullable()->unsigned();
            $table->string('name');
            $table->text('description');
            $table->string('homepage');
            $table->boolean('enabled');
            $table->timestamp("reviwed_at")->nullable();
            $table->timestamps();
            $table->foreign('developer_id')->references('id')
                ->on('users')->onUpdate("cascade");
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
}
