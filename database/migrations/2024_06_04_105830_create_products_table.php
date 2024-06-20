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
            $table->unsignedBigInteger('source_product_id');
            $table->string('description1');
            $table->string('description2')->nullable();
            $table->string('description3')->nullable();
            $table->string('description4')->nullable();
            $table->decimal('discount', 10, 2)->default(0.00);
            $table->decimal('cost', 10, 2);
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->integer('sku');
            $table->string('size')->nullable();
            $table->string('season')->nullable();
            $table->string('color')->nullable();
            $table->string('collection')->nullable();
            $table->string('category')->nullable();
            $table->string('item_type')->nullable();
            $table->boolean('taxable');
            $table->decimal('tax', 10, 2)->default(0.00);
            $table->decimal('tax_perc', 10, 2)->default(0.00);
            $table->string('sid')->nullable();
            $table->unsignedBigInteger('store_id')->nullable();
            $table->string('subsidiary_no')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('created_by')->default("SYSADMIN");
            $table->string('updated_by')->default("SYSADMIN");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('source_created_at')->nullable();
            $table->timestamp('source_updated_at')->nullable();


            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');

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
