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
        Schema::create('sub_subcategory', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_category');
            $table->unsignedBigInteger('id_sub_cat');
            $table->string('name',100);
            $table->timestamps();

            $table->index('id_category');
            $table->index('id_sub_cat');

            $table->foreign('id_category')
            ->references('id')
            ->on('category')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('id_sub_cat')
            ->references('id')
            ->on('subcategory')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_subcategory');
    }
};
