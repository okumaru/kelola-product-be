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
      $table->string('title', 100);
      $table->text('description');
      $table->integer('price');
      $table->double('discountPercentage', 8, 2);
      $table->double('rating', 8, 2);
      $table->integer('stock');
      $table->string('brand', 100);
      $table->string('category', 100);
      $table->text('thumbnail')->nullable();
      $table->timestamps();
      $table->index('id');
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
