<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('variations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attribute_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('variation_translations', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('variation_id');
            $table->string('name')->nullable();
            $table->string('locale')->index();
            $table->unique(['variation_id', 'locale']);
            $table->foreign('variation_id')->references('id')->on('variations')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variations');
        Schema::dropIfExists('variation_translations');
    }
};
