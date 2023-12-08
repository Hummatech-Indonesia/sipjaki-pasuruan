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
        Schema::create('dinas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('field_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('dinas');
            $table->char('type', 4);
            $table->string('sections');
            $table->text('address');
            $table->string('phone_number');
            $table->char('echelon', 4);
            $table->string('local_regulation');
            $table->string('number_local_regulation');
            $table->string('sk_tpjk');
            $table->string('number_sk_tpjk');
            $table->string('admin_sipjaki');
            $table->string('number_sk_sipjaki');
            $table->string('activity')->nullable();
            $table->integer('last_year_budget');
            $table->integer('budget_this_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dinas');
    }
};
