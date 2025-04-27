<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::dropIfExists('products'); // Ajouté pour éviter l'erreur
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('category');
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }
    

    public function down(): void {
        Schema::dropIfExists('products');
    }
};
