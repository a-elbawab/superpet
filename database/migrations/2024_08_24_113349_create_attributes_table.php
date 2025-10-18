<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });


        Schema::create('attribute_translations', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('attribute_id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('locale')->index();
            $table->unique(['attribute_id', 'locale']);
            $table->foreign('attribute_id')->references('id')->on('attributes')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attributes');
        Schema::dropIfExists('attribute_translations');
    }
}
