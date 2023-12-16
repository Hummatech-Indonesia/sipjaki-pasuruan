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
        Schema::create('verifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('service_provider_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('judiciary_number');
            $table->date('judiciary_date')->nullable();
            $table->string('district_court_number');
            $table->date('district_court_date')->nullable();
            $table->string('state_institution_number');
            $table->date('state_institution_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifications');
    }
};
