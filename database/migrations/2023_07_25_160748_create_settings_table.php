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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('address', 500)->nullable();
            $table->string('about', 1000)->nullable();
            $table->string('email_id', 255)->nullable();
            $table->string('contact_no', 13)->nullable();
            $table->string('facebook', 1000)->nullable();
            $table->string('instagram', 1000)->nullable();
            $table->string('twitter', 1000)->nullable();
            $table->string('youtube', 1000)->nullable();
            $table->string('maps', 1000)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
