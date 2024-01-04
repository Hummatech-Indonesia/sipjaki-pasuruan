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
        Schema::create('consultant_projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('project_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name_package')->nullable();
            $table->string('contract')->nullable();
            $table->string('administrative_minutes')->nullable();
            $table->string('report')->nullable();
            $table->string('minutes_of_disbursement')->nullable();
            $table->string('minutes_of_hand_over')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultant_projects');
    }
};
