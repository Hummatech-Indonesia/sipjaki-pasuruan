<?php

use App\Enums\UploadDiskEnum;
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
        Schema::create('images', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->longText('photo');
            $table->enum('categories', [UploadDiskEnum::STRUCTUREORGANITATION->value, UploadDiskEnum::JOBANDFUNCTION->value, UploadDiskEnum::STRATEGICPLAN->value]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
