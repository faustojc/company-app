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
        Schema::create('delivery', function (Blueprint $table) {
            $table->bigIncrements('delivery_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('order_id');
            $table->integer('delivery_fee');
            $table->dateTime('delivery_date');
            $table->string('address_to_deliver');
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
        Schema::table('delivery', function (Blueprint $table) {
            $table->dropForeign('delivery_order_id_foreign');
            $table->dropForeign('delivery_customer_id_foreign');
        });
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('delivery');
    }
};
