<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('city_translations', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('city_id');
            $table->string('name')->nullable();
            $table->string('locale')->index();
            $table->unique(['city_id', 'locale']);
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_translations');
        Schema::dropIfExists('cities');
    }
}
