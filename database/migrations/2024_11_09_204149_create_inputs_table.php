<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('sections')->onDelete('cascade');
            $table->integer('order')->nullable();
            $table->string('type');
            $table->boolean('required');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('input_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('input_id')->constrained('inputs')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('label');
            $table->unique(['input_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inputs');
        Schema::dropIfExists('input_translations');
    }
}
