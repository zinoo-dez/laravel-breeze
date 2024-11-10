<?php

use App\Enums\ActiveinactiveType;
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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_featured')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->string('title')->nullable();
            $table->foreignId('news_category_id')->constrained();
            $table->text('content')->nullable();
            $table->string('status')->default(ActiveinactiveType::Inactive->value);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
