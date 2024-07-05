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
        if(Schema::hasColumn('executor_projects', 'consultant_project_id')) return;
        Schema::table('executor_projects', function (Blueprint $table) {
            $table->dropForeign(['dinas_id']);

            // Make the column nullable and reapply the constraints
            $table->uuid('dinas_id')->nullable()->change();
            $table->foreign('dinas_id')->references('id')->on('dinas')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
