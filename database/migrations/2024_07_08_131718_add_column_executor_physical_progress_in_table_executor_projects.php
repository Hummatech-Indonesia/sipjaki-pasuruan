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
        if(!Schema::hasColumn('executor_projects','executor_physical_progress')){
            Schema::table('executor_projects', function (Blueprint $table) {
                $table->integer('executor_physical_progress')->default(0);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_executor_projects', function (Blueprint $table) {
            //
        });
    }
};
