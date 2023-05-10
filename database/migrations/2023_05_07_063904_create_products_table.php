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
            $table->unsignedBigInteger('id_category');
            $table->unsignedBigInteger('id_sub_cat')->nullable();
            $table->unsignedBigInteger('id_sub_sub_cat')->nullable();
            $table->string('name',100);
            $table->string('brand',100)->nullable();
            $table->string('article',100);
            $table->text('description');
            $table->integer('amount')->nullable();
            $table->integer('price');
            $table->string('image',150);
            $table->timestamps();
            $table->softDeletes();

            $table->index('id_category');
            $table->index('id_sub_cat');
            $table->index('id_sub_sub_cat');

            $table->foreign('id_category')->references('id')->on('category');
            $table->foreign('id_sub_cat')->references('id')->on('subcategory');
            $table->foreign('id_sub_sub_cat')->references('id')->on('sub_subcategory');
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
