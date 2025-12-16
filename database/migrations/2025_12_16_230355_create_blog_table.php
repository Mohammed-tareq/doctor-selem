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
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->json('content');
            $table->text('image_cover')->nullable();
            $table->text('type');
            $table->date('date');
            $table->unsignedBigInteger('publisher')->nullable();
            $table->timestamps();
            
            $table->foreign('publisher')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
