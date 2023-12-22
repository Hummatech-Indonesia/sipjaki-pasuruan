<?php

use App\Enums\FormOfBusinessEntityEnum;
use App\Enums\TypeOfBusinessEntityEnum;
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
        Schema::create('service_providers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('association_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('address')->nullable();
            $table->string('city', 50)->nullable();
            $table->char('postal_code', 10)->nullable();
            $table->string('province')->nullable();
            $table->text('website')->nullable();
            $table->string('fax')->nullable();
            $table->string('file')->nullable(); 
            $table->enum('form_of_business_entity', [FormOfBusinessEntityEnum::CV->value, FormOfBusinessEntityEnum::PT->value])->nullable();
            $table->enum('type_of_business_entity', [TypeOfBusinessEntityEnum::EXECUTOR->value, TypeOfBusinessEntityEnum::CONSULTANT->value])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_providers');
    }
};
