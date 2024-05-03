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
        Schema::create('executor_projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('fund_source_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('contract_category_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('service_provider_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('consultant_project_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('fiscal_year_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->bigInteger('project_value')->default(0);
            $table->enum('characteristic_project', [CharacteristicProjectEnum::SINGLE->value, CharacteristicProjectEnum::MULTIPLE->value]);
            $table->integer('physical_progress')->default(0);
            $table->dateTime('physical_progress_start')->nullable();
            $table->dateTime('finance_progress_start')->nullable();
            $table->integer('finance_progress')->default(0);
            $table->string('contract')->nullable();
            $table->string('order_mail')->nullable();
            $table->string('administrative_minutes')->nullable();
            $table->string('uitzet_minutes')->nullable();
            $table->string('pcm_minutes')->nullable();
            $table->string('invoice')->nullable();
            $table->string('mutual_check_0')->nullable();
            $table->string('shop_drawing')->nullable();
            $table->string('asbuild_drawing')->nullable();
            $table->string('mutual_check_100')->nullable();
            $table->string('p1_meeting_minutes')->nullable();
            $table->string('p2_meeting_minutes')->nullable();
            $table->string('minutes_of_disbursement')->nullable();
            $table->string('report')->nullable();
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->enum('status', [StatusEnum::ACTIVE->value, StatusEnum::NONACTIVE->value,StatusEnum::CANCELED->value]);
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
