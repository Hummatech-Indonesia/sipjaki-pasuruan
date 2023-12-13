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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('section_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('type_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('address')->nullable();
            $table->string('mobile_phone_number')->nullable();
            $table->char('echelon', 4)->nullable();
            $table->string('position')->nullable();
            $table->string('name_official')->nullable();
            $table->string('email_official')->nullable();
            $table->string('local_regulation')->nullable(); //Perda STOK
            $table->string('number_local_regulation')->nullable(); //No Perda
            $table->string('sk_tpjk')->nullable();
            $table->string('number_sk_tpjk')->nullable();
            $table->string('admin_sipjaki')->nullable();
            $table->string('number_sk_sipjaki')->nullable();
            $table->string('activity')->nullable();
            $table->integer('last_year_budget')->nullable();
            $table->integer('budget_this_year')->nullable();
            $table->text('sturucture_organization_file')->nullable();
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
