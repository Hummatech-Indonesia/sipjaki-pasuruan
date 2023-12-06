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
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('dinas_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('service_provider_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('fund_source_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('contract_category_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->dateTime('physical_progress_start');
            $table->dateTime('finance_progress_start');
            $table->integer('physical_progress')->default(0);
            $table->integer('finance_progress')->default(0);
            $table->integer('year');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
