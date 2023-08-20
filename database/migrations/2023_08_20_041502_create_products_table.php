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
            $table->string('product_name');
            $table->unsignedBigInteger('parent_category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->text('product_description')->nullable();
            $table->decimal('regular_price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('parent_category_id')->references('id')->on('categories');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
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
