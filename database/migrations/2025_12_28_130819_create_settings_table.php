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

            $table->string('site_name', 150);
            $table->string('tagline', 255)->nullable();

            $table->string('primary_email', 150);
            $table->json('notification_emails')->nullable();

            $table->string('primary_phone', 20)->nullable();
            $table->string('whatsapp_number', 20)->nullable();

            $table->text('address')->nullable();

            $table->timestamps();
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
