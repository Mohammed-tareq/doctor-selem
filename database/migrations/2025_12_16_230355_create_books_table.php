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
            $table->string('title');
            $table->string('lang');
            $table->mediumText('summary')->nullable();
            $table->json('images')->nullable();
            $table->string('link')->nullable();
            $table->string('publishing_house')->nullable();
            $table->date('date');
            $table->string('type');
            $table->mediumText('goals')->nullable();
            $table->integer('edition_number');
            $table->integer('pages')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
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
