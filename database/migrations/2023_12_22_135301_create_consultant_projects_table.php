<?php

use App\Enums\StatusEnum;
use Illuminate\Support\Facades\Schema;
use App\Enums\CharacteristicProjectEnum;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consultant_projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('dinas_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('fund_source_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('contract_category_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('service_provider_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('fiscal_year_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->bigInteger('project_value');
            $table->enum('characteristic_project', [CharacteristicProjectEnum::SINGLE->value, CharacteristicProjectEnum::MULTIPLE->value]);
            $table->dateTime('finance_progress_start')->nullable();
            $table->integer('finance_progress')->default(0);
            $table->string('contract')->nullable();
            $table->string('administrative_minutes')->nullable();
            $table->string('report')->nullable();
            $table->string('minutes_of_disbursement')->nullable();
            $table->string('minutes_of_hand_over')->nullable();
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->enum('status', [StatusEnum::ACTIVE->value, StatusEnum::NONACTIVE->value,StatusEnum::CANCELED->value]);
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
