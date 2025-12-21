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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('lang');
            $table->mediumText('summary');
            $table->json('images')->nullable();
            $table->string('link');
            $table->string('publishing_house');
            $table->date('date');
            $table->mediumText('goals');
            $table->string('edition_number');
            $table->integer('pages');
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->integer('num_view')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
