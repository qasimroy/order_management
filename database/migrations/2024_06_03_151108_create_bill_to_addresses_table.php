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
        Schema::create('bill_to_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email', 191);
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('company')->nullable();
            $table->string('country');
            $table->string('country_code')->nullable();
            $table->string('zip')->nullable();
            $table->string('created_by')->default("SYSADMIN");
            $table->string('updated_by')->default("SYSADMIN");
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_to_addresses');
    }
};
