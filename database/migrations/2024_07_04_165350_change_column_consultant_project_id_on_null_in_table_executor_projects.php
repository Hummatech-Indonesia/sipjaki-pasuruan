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
        if(Schema::hasColumn('executor_projects', 'consultant_project_id')) {
            Schema::table('executor_projects', function (Blueprint $table) {
                $table->dropForeign(['consultant_project_id']);

                // Make the column nullable and reapply the constraints
                $table->uuid('consultant_project_id')->nullable()->change();
                $table->foreign('consultant_project_id')->references('id')->on('consultant_projects')->cascadeOnDelete()->cascadeOnUpdate();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
