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
        Schema::create('order_line_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('source_line_item_id')->nullable();
            $table->unsignedBigInteger('order_id');
            $table->string('order_no');
            $table->string('description1');
            $table->string('description2')->nullable();
            $table->string('description3')->nullable();
            $table->string('description4')->nullable();
            $table->decimal('discount', 8, 2);
            $table->decimal('org_price', 8, 2);
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
            $table->unsignedBigInteger('sku');
            $table->string('size')->nullable();
            $table->string('season')->nullable();
            $table->string('color')->nullable();
            $table->string('collection')->nullable();
            $table->string('category')->nullable();
            $table->string('item_type');
            $table->boolean('taxable')->default(0);
            $table->decimal('tax', 8, 2)->default(0.00);
            $table->decimal('tax_perc', 8, 2)->default(0.00);
            $table->string('sid')->nullable();
            $table->string('store_no')->nullable();
            $table->string('subsidiary_no')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_line_items');
    }
};
