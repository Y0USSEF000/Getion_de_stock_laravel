<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();      
            $table->string('phone')->nullable();      
            $table->string('category')->nullable();   
            $table->decimal('price', 8, 2);
            $table->integer('quantity')->nullable();  
            $table->string('image')->nullable();      
            $table->text('description')->nullable();  
            $table->timestamps();
        });
        
        
    }
    

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
