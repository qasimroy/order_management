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
            $table->unsignedBigInteger('source_id');
            $table->unsignedBigInteger('ref_order_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('ship_to_address_id')->nullable();
            $table->unsignedBigInteger('bill_to_address_id')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->unsignedBigInteger('order_store_assignment_id')->nullable();
            $table->integer('line_items')->default(0);
            $table->unsignedBigInteger('source_order_id');
            $table->string('source_order_no');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('financial_status');
            $table->string('fulfillment_status');
            $table->decimal('total_amount', 8, 2);
            $table->decimal('total_subtotal_amount', 8, 2);
            $table->integer('total_quantity');
            $table->decimal('total_tax_amount', 8, 2);
            $table->decimal('total_discount_amount', 8, 2);
            $table->integer('ordered_quantity');
            $table->integer('fulfilled_quantity')->nullable();
            $table->string('subsidiary_no')->nullable();
            $table->string('order_notes')->nullable();
            $table->string('remarks')->nullable();
            $table->string('instructions')->nullable();
            $table->string('delivery_notes')->nullable();
            $table->string('option1')->nullable();
            $table->string('option2')->nullable();
            $table->string('option3')->nullable();
            $table->string('status');
            $table->string('order_type');
            $table->timestamp('order_created_at')->nullable();
            $table->timestamp('order_updated_at')->nullable();
            $table->timestamps();

            $table->foreign('source_id')->references('id')->on('sources')->onDelete('cascade');
            $table->foreign('ref_order_id')->references('id')->on('orders')->onDelete('set null');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            $table->foreign('ship_to_address_id')->references('id')->on('ship_to_address')->onDelete('set null');
            $table->foreign('bill_to_address_id')->references('id')->on('bill_to_address')->onDelete('set null');
            $table->foreign('payment_id')->references('id')->on('payment')->onDelete('set null');
            $table->foreign('order_store_assignment_id')->references('id')->on('order_store_assignments')->onDelete('set null');
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
