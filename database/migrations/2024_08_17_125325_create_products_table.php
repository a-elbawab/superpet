<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('parent_id')->nullable();
            $table->foreignId('sub_category_id')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('stock')->default(0);
            $table->boolean('best_seller')->default(0);
            $table->float('price')->default(0.0);
            $table->float('old_price')->nullable()->default(0.0);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('product_translations', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('product_id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('locale')->index();
            $table->unique(['product_id', 'locale']);
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_translations');
    }
}
