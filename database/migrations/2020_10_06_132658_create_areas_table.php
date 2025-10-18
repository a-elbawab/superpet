<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('area_translations', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('area_id');
            $table->string('name')->nullable();
            $table->string('locale')->index();
            $table->unique(['area_id', 'locale']);
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('area_id')->nullable();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_translations');
        Schema::dropIfExists('areas');
    }
}
