<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('stock_products'); // ← ajoute cette ligne
    
        Schema::create('stock_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->decimal('product_price', 8, 2);
            $table->integer('product_quantity');
            $table->text('product_description')->nullable();
            $table->string('product_type');
            $table->string('product_img')->nullable();
            $table->timestamps();
        });
    }
    

    public function down(): void
    {
        Schema::dropIfExists('stock_products');
    }
};