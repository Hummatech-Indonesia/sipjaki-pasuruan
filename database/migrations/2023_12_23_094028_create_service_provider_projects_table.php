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
        Schema::create('service_provider_projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('executor_project_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->double('progres')->default(0.0);
            $table->date('date_start');
            $table->date('date_finish');
            $table->integer('week');
            $table->string('file')->nullable();
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_provider_projects');
    }
};
