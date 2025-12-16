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
            $table->text('title');
            $table->text('lang');
            $table->longText('summary');
            $table->json('images')->nullable();
            $table->text('link')->nullable();
            $table->unsignedBigInteger('publishing_house')->nullable();
            $table->dateTime('date');
            $table->text('type');
            $table->integer('edition_number');
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
