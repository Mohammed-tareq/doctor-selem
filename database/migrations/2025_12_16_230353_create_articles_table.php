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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('type');
            $table->date('year');
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('writer');
            $table->string('post_by');
            $table->json('references')->nullable();
            $table->integer('num_view')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
