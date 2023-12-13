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
        Schema::create('dinas_fields', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('field_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('dinas_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dinas_fields');
    }
};
