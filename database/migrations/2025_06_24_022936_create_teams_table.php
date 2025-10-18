<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('team_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id');
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('locale')->index();
            $table->unique(['team_id', 'locale']);
            $table->foreign('team_id')->references('id')->on('teams')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_translations');
        Schema::dropIfExists('teams');
    }
}
