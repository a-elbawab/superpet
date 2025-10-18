<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('slider_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('slider_id');
            $table->longText('paragraph')->nullable();
            $table->longText('paragraph2')->nullable();
            $table->string('locale')->index();
            $table->unique(['slider_id', 'locale']);
            $table->foreign('slider_id')->references('id')->on('sliders')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
        Schema::dropIfExists('slider_translations');
    }
}
