<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('stock_products', function (Blueprint $table) {
            // Add product_description if not exists
            if (!Schema::hasColumn('stock_products', 'product_description')) {
                $table->text('product_description')->nullable()->after('product_quantity');
            }

            // Skip product_type since it already exists
            // Add product_img if not exists
            if (!Schema::hasColumn('stock_products', 'product_img')) {
                $table->string('product_img')->nullable()->after('product_type');
            }
        });
    }

    public function down(): void
    {
        Schema::table('stock_products', function (Blueprint $table) {
            // Drop columns only if they exist
            if (Schema::hasColumn('stock_products', 'product_description')) {
                $table->dropColumn('product_description');
            }
            if (Schema::hasColumn('stock_products', 'product_img')) {
                $table->dropColumn('product_img');
            }
        });
    }
};