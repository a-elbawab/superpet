<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('input_id')->constrained('inputs')->onDelete('cascade');
            $table->string('value');
            $table->timestamps();
        });


        Schema::create('option_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('option_id')->constrained('options')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['option_id', 'locale']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
        Schema::dropIfExists('option_translations');
    }
}
