<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('post_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id');
            $table->string('name')->nullable();
            $table->longText(column: 'paragraph')->nullable();
            $table->string('locale')->index();
            $table->unique(['post_id', 'locale']);
            $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_translations');
        Schema::dropIfExists('posts');
    }
}
