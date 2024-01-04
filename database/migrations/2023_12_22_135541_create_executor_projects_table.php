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
        Schema::create('executor_projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('project_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('contract')->nullable();
            $table->string('administrative_minutes')->nullable();
            $table->string('uitzet_minutes')->nullable();
            $table->string('mutual_check_0')->nullable();
            $table->string('mutual_check_100')->nullable();
            $table->string('p1_meeting_minutes')->nullable();
            $table->string('p2_meeting_minutes')->nullable();
            $table->string('minutes_of_disbursement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('executor_projects');
    }
};
