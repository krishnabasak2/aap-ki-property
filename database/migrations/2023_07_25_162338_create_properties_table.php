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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_id')->nullable();
            $table->string('owner_name', 255)->nullable();
            $table->string('owner_mobile', 12)->nullable();
            $table->string('owner_email', 255)->nullable();
            $table->string('property_name', 500)->nullable();
            $table->string('size', 500)->nullable();
            $table->string('property_desc', 1000)->nullable();
            $table->longText('property_images')->nullable();
            $table->string('property_address', 500)->nullable();
            $table->string('property_location', 500)->nullable();
            $table->string('property_price', 10);
            $table->set('type', ['Residential', 'Commercial'])->default('Residential');
            $table->set('listing_for', ['Rental', 'Selling'])->default('Selling');
            $table->set('status', ['Pending', 'Approve', 'Reject', 'Process'])->default('Pending');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
