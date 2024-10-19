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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('store_id')->constrained('stores')->cascadeOnDelete();
            $table->foreignId('brand_id')->constrained()->nullable();
            $table->foreignId('category_id')->constrained()->nullable();
            $table->string('name')->nullable();
            $table->string('sorting')->default(999);
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
