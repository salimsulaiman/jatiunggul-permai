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
        Schema::create('offering_section_details', function (Blueprint $table) {
            $table->id();
            $table->text('sub_title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->text('button_text');
            $table->text('url')->nullable();
            $table->foreignId('offering_section_id')->constrained('offering_sections')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offering_section_details');
    }
};
