<?php

use App\Enums\GenderEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('training_members', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('training_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('position')->nullable();
            $table->text('address');
            $table->char('phone_number',14);
            $table->string('decree');
            $table->enum('gender',[GenderEnum::MALE->value,GenderEnum::FEMALE->value]);
            $table->text('file')->nullable();
            $table->char('national_identity_number',18);
            $table->string('education');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_members');
    }
};
