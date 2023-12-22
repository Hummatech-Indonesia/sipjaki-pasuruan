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
        Schema::create('worker_certificates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('worker_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('service_provider_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('file');
            $table->string('certificate');
            $table->string('registration_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worker_certificates');
    }
};
