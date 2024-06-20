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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('source_id');
            $table->unsignedBigInteger('business_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email', 191)->unique();
            $table->string('contact_no')->nullable();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('country');
            $table->string('country_code');
            $table->string('zip')->nullable();
            $table->enum('taxable', ['yes', 'no'])->default('no');
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->date('annivarsary_date')->nullable();
            $table->string('info1')->nullable();
            $table->string('info2')->nullable();
            $table->string('info3')->nullable();
            $table->string('info4')->nullable();
            $table->string('created_by')->default("SYSADMIN");
            $table->string('updated_by')->default("SYSADMIN");
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
            $table->foreign('source_id')->references('id')->on('sources')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
