<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('stock_products', function (Blueprint $table) {
            // Add product_type only if it doesn't exist
            if (!Schema::hasColumn('stock_products', 'product_type')) {
                $table->string('product_type')->nullable()->after('product_price');
            }
        });
    }

    public function down(): void
    {
        Schema::table('stock_products', function (Blueprint $table) {
            // Drop product_type if it exists
            if (Schema::hasColumn('stock_products', 'product_type')) {
                $table->dropColumn('product_type');
            }
        });
    }
};