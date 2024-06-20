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
        Schema::create('trackings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fulfillment_id');
            $table->unsignedBigInteger('souce_fulfillment_id');
            $table->unsignedBigInteger('order_id');
            $table->string('order_no');
            $table->unsignedBigInteger('carrier_id');
            $table->string('carrier_name');
            $table->string('tracking_no');
            $table->string('tracking_link');
            $table->string('created_by')->default("SYSADMIN");
            $table->string('updated_by')->default("SYSADMIN");
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('fulfillment_id')->references('id')->on('fulfillments')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('carrier_id')->references('id')->on('shipping_companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trackings');
    }
};
