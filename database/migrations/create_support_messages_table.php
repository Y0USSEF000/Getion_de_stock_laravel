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
        // Check if table exists before trying to create it
        if (!Schema::hasTable('support_messages')) {
            Schema::create('support_messages', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email');
                $table->string('subject');
                $table->text('message');
                $table->boolean('is_read')->default(false);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_messages');
    }
};
