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
        Schema::table('products', function (Blueprint $table) {
            $table->index(['is_active', 'is_featured'], 'products_active_featured_index');
            $table->index(['category_id', 'is_active'], 'products_category_active_index');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->index(['is_active', 'sort_order'], 'categories_active_sort_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('products_active_featured_index');
            $table->dropIndex('products_category_active_index');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex('categories_active_sort_index');
        });
    }
};
