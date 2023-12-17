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
        Schema::create('amendment_deeds', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('service_provider_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('deed_number');
            $table->string('notary_name');
            $table->text('address');
            $table->string('city');
            $table->string('province');
            $table->timestamps();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amendment_deeds');
    }
};
