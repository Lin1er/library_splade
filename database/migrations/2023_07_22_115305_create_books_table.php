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
            $table->json('category_id'); // Kolom untuk menyimpan ID kategori dalam bentuk JSON
            $table->text('title');
            $table->text('author');
            $table->text('publisher');
            $table->text('synopsis')->nullable();
            $table->integer('publication_year')->nullable();
            $table->text('image_url')->nullable();
            $table->text('pdf_url')->nullable();
            $table->text('isbn')->nullable();
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
