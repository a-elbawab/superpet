<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->nullable()->constrained('pages')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('item_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id');
            $table->string('name')->nullable();
            $table->string('locale')->index();
            $table->unique(['item_id', 'locale']);
            $table->foreign('item_id')->references('id')->on('items')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_translations');
        Schema::dropIfExists('items');
    }
}
