<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('product_translations')) {
            Schema::table('product_translations', function (Blueprint $table) {
                if (!Schema::hasColumn('product_translations', 'slug')) {
                    $table->string('slug', 191)->nullable()->after('name');
                    $table->unique(['locale', 'slug'], 'product_translations_locale_slug_unique');
                }
                if (!Schema::hasColumn('product_translations', 'meta_description')) {
                    $table->text('meta_description')->nullable()->after('description');
                }
                if (!Schema::hasColumn('product_translations', 'meta_keywords')) {
                    $table->text('meta_keywords')->nullable()->after('meta_description');
                }
            });
        }

        if (Schema::hasTable('category_translations')) {
            Schema::table('category_translations', function (Blueprint $table) {
                if (!Schema::hasColumn('category_translations', 'slug')) {
                    $table->string('slug', 191)->nullable()->after('name');
                    $table->unique(['locale', 'slug'], 'category_translations_locale_slug_unique');
                }
                if (!Schema::hasColumn('category_translations', 'meta_description')) {
                    $table->text('meta_description')->nullable()->after('name');
                }
                if (!Schema::hasColumn('category_translations', 'meta_keywords')) {
                    $table->text('meta_keywords')->nullable()->after('meta_description');
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('product_translations')) {
            Schema::table('product_translations', function (Blueprint $table) {
                if (Schema::hasColumn('product_translations', 'slug')) {
                    $table->dropUnique('product_translations_locale_slug_unique');
                    $table->dropColumn('slug');
                }
                if (Schema::hasColumn('product_translations', 'meta_keywords')) {
                    $table->dropColumn('meta_keywords');
                }
                if (Schema::hasColumn('product_translations', 'meta_description')) {
                    $table->dropColumn('meta_description');
                }
            });
        }

        if (Schema::hasTable('category_translations')) {
            Schema::table('category_translations', function (Blueprint $table) {
                if (Schema::hasColumn('category_translations', 'slug')) {
                    $table->dropUnique('category_translations_locale_slug_unique');
                    $table->dropColumn('slug');
                }
                if (Schema::hasColumn('category_translations', 'meta_keywords')) {
                    $table->dropColumn('meta_keywords');
                }
                if (Schema::hasColumn('category_translations', 'meta_description')) {
                    $table->dropColumn('meta_description');
                }
            });
        }
    }
};
