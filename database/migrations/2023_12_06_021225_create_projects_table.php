<?php

use App\Enums\CharacteristicProject;
use App\Enums\CharacteristicProjectEnum;
use App\Enums\StatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('dinas_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('fund_source_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('contract_category_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->char('consultant_id', 36);
            $table->char('executor_id', 36);
            $table->string('name');
            $table->integer('project_value');
            $table->enum('characteristic_project', [CharacteristicProjectEnum::SINGLE->value, CharacteristicProjectEnum::MULTIPLE->value]);
<<<<<<< Updated upstream
            $table->integer('physical_progress');
            $table->dateTime('physical_progress_start');
            $table->dateTime('finance_progress_start');
=======
            $table->dateTime('physical_progress_start')->nullable();
            $table->dateTime('finance_progress_start')->nullable();
>>>>>>> Stashed changes
            $table->integer('finance_progress')->default(0);
            $table->integer('year');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->string('contract')->nullable();
            $table->string('administrative_minutes')->nullable();
            $table->string('report')->nullable();
            $table->string('minutes_of_disbursement')->nullable();
            $table->enum('status', [StatusEnum::ACTIVE->value, StatusEnum::NONACTIVE->value]);
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
