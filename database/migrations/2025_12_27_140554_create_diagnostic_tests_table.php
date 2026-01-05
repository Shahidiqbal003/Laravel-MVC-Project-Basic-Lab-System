<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('diagnostic_tests', function (Blueprint $table) {
            $table->id();

            $table->string('name', 150);
            $table->string('category', 100)->nullable();

            $table->decimal('price', 10, 2)->nullable();
            $table->string('sample_type', 100)->nullable();
            $table->string('report_time', 100)->nullable();

            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            // checkboxes / flags
            $table->boolean('show_on_home')->default(false);
            $table->boolean('is_coming_soon')->default(false);
            $table->boolean('is_active')->default(true);

            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diagnostic_tests');
    }
};
