<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First truncate the table to remove existing data
        DB::table('brands')->truncate();

        // For SQLite, we need to recreate the table
        if (DB::connection()->getDriverName() === 'sqlite') {
            // Create a new simplified table
            Schema::create('brands_new', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('description')->nullable();
                $table->string('image')->nullable();
                $table->boolean('active')->default(true);
                $table->timestamps();
            });

            // Drop old table and rename new one
            Schema::dropIfExists('brands');
            Schema::rename('brands_new', 'brands');
        } else {
            // For MySQL/PostgreSQL, use standard alter statements
            Schema::table('brands', function (Blueprint $table) {
                // Drop unique index first
                $table->dropUnique(['slug']);
            });

            Schema::table('brands', function (Blueprint $table) {
                // Rename columns
                $table->renameColumn('logo', 'image');
                $table->renameColumn('is_active', 'active');

                // Drop unnecessary columns
                $table->dropColumn([
                    'name_ar',
                    'slug',
                    'description_ar',
                    'website_url',
                    'is_featured',
                    'sort_order',
                ]);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (DB::connection()->getDriverName() === 'sqlite') {
            // Recreate the original table structure
            Schema::create('brands_old', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('name_ar')->nullable();
                $table->string('slug')->unique();
                $table->string('logo')->nullable();
                $table->text('description')->nullable();
                $table->text('description_ar')->nullable();
                $table->string('website_url')->nullable();
                $table->boolean('is_featured')->default(false);
                $table->integer('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });

            Schema::dropIfExists('brands');
            Schema::rename('brands_old', 'brands');
        } else {
            Schema::table('brands', function (Blueprint $table) {
                // Rename back
                $table->renameColumn('image', 'logo');
                $table->renameColumn('active', 'is_active');

                // Re-add columns
                $table->string('name_ar')->nullable()->after('name');
                $table->string('slug')->unique()->after('name_ar');
                $table->text('description_ar')->nullable()->after('description');
                $table->string('website_url')->nullable()->after('description_ar');
                $table->boolean('is_featured')->default(false)->after('website_url');
                $table->integer('sort_order')->default(0)->after('is_featured');
            });
        }
    }
};
