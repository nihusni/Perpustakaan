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
            $table->string('isbn')->nullable();
            $table->string('title')->nullable();
            $table->string('auther_name')->nullable();
            $table->string('price')->nullable();
            $table->longText('description')->nullable();
            $table->string('quantity')->nullable();
            $table->string('book_img')->nullable();
            $table->string('auther_img')->nullable();

            $table->bigInteger('category_id');

            $table->bigInteger('bookshelve_id');

                       


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
