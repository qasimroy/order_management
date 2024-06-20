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
        Schema::create('fulfillments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('source_fulfillment_id');
            $table->unsignedBigInteger('order_id');
            $table->string('order_no');
            $table->unsignedBigInteger('ship_to_id');
            $table->unsignedBigInteger('bill_to_id');
            $table->string('package_weight')->nullable();
            $table->string('package_size')->nullable();
            $table->string('package_type')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->string('status');

            // Foreign key constraint
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('ship_to_id')->references('ship_to_address_id')->on('orders')->onDelete('cascade');
            $table->foreign('bill_to_id')->references('bill_to_address_id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fulfillments');
    }
};
