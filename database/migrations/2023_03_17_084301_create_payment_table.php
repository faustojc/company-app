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
        Schema::create('payment', function (Blueprint $table) {
            $table->bigIncrements('payment_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('order_id');
            $table->string('payment_method');
            $table->string('credit_card_number');
            $table->date('credit_card_expdate');
            $table->timestamps();
            $table->foreign('customer_id')->references('customer_id')->on('customer')->onDelete('cascade');
            $table->foreign('order_id')->references('order_id')->on('order')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('payment', function (Blueprint $table) {
            $table->dropForeign('payment_customer_id_foreign');
            $table->dropForeign('payment_order_id_foreign');
        });
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('payment');
    }
};
