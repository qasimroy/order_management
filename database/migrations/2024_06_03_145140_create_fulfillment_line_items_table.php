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
        Schema::create('fulfillment_line_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('source_fulfillment_line_item_id');
            $table->unsignedBigInteger('line_item_sys_id');
            $table->unsignedBigInteger('order_line_item_id');
            $table->unsignedBigInteger('fulfillment_id');
            $table->unsignedBigInteger('tracking_id')->nullable();
            $table->integer('current_quantity');
            $table->integer('fulfillable_quantity');
            $table->unsignedBigInteger('fulfillment_store_id')->nullable();
            $table->string('fulfillment_status');
            $table->string('description1');
            $table->string('description2')->nullable();
            $table->string('description3')->nullable();
            $table->string('description4')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
            $table->string('sku');
            $table->string('size');
            $table->string('season');
            $table->string('color');
            $table->string('collection');
            $table->string('category');
            $table->string('item_type');
            $table->boolean('taxable');
            $table->decimal('total_discount', 8, 2);
            $table->string('vendor');
            $table->integer('tax_rate');
            $table->decimal('tax_price', 8, 2);
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('order_line_item_id')->references('id')->on('order_line_items')->onDelete('cascade');
            $table->foreign('fulfillment_id')->references('id')->on('fulfillments')->onDelete('cascade');
            $table->foreign('fulfillment_store_id')->references('id')->on('stores')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fulfillment_line_items');
    }
};
