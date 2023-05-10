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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('shipping_methods',100);
            $table->string('name',100);
            $table->string('surname',100);
            $table->string('telephone',100);
            $table->string('email',100);
            $table->string('payment_method',100);
            $table->integer('status')->default(0);
            $table->integer('price_itog');
            $table->string('street',100)->nullable();
            $table->string('home',100)->nullable();
            $table->string('entrance',100)->nullable();
            $table->string('flat',100)->nullable();
            $table->integer('status_payment')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index('id_user');
            $table->foreign('id_user')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
