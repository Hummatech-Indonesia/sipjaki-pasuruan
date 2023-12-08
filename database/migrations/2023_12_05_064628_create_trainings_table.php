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
        Schema::create('trainings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('training_method_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('fiscal_year_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('sub_classifications')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('qualification_level_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->dateTime('start_at');
            $table->dateTime('end_time');
            $table->integer('lesson_hour');
            $table->text('location');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
