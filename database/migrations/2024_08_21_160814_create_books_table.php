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
            $table->string('name');
            $table->string('cover_image');
            $table->text('description');
            $table->integer('price');
            $table->integer('price_sale');
            $table->integer('stock');
            $table->foreignId('author_id')->constrained('authors')->onUpdate('cascade')->onDelete('cascade');;
            $table->foreignId('publisher_id')->constrained('publishers')->onUpdate('cascade')->onDelete('cascade');;
            $table->foreignId('category_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');;
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
