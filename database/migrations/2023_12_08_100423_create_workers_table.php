<?php

use App\Enums\CitizenshipEnum;
use App\Enums\GenderEnum;
use App\Enums\MaritalStatusEnum;
use App\Enums\ReligionEnum;
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
        Schema::create('workers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('service_provider_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->char('national_identity_number',18);
            $table->string('name');
            $table->date('birth_date');
            $table->enum('gender', [GenderEnum::MALE->value, GenderEnum::FEMALE->value]);
            $table->text('address');
            $table->enum('religion', [ReligionEnum::ISLAM->value, ReligionEnum::KRISTEN->value, ReligionEnum::KATHOLIK->value, ReligionEnum::HINDU->value, ReligionEnum::BUDHA->value, ReligionEnum::NOTFILLED->value]);
            $table->enum('marital_status', [MaritalStatusEnum::MARRY->value, MaritalStatusEnum::SINGLE->value, MaritalStatusEnum::DIVORCED->value, MaritalStatusEnum::DEATH_DIVORCE->value]);
            $table->enum('citizenship', [CitizenshipEnum::WNA->value, CitizenshipEnum::WNI->value]);
            $table->string('education');
            $table->string('phone_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
