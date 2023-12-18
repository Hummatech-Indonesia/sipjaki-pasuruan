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
        Schema::create('service_provider_qualifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('sub_classification_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('service_provider_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('qualification_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->char('year', 4);
            $table->boolean('status')->default(0);
            $table->dateTime('first_print')->nullable();
            $table->dateTime('last_print')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_provider_qualifications');
    }
};
