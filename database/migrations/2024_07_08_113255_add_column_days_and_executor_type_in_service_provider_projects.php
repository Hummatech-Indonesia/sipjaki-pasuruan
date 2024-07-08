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
        if(!Schema::hasColumn("service_provider_projects","days")){
            Schema::table('service_provider_projects', function (Blueprint $table) {
                $table->integer("days")->nullable();
            });
        }
        if(!Schema::hasColumn("service_provider_projects","executor_type")){
            Schema::table('service_provider_projects', function (Blueprint $table) {
                $table->string("executor_type")->nullable();
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
