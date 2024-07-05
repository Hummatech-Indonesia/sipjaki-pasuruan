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
        if(!Schema::hasColumn("service_provider_projects","page")){
            Schema::table('service_provider_projects', function (Blueprint $table) {
                $table->integer("page")->nullable();
            });
        }
        if(!Schema::hasColumn("service_provider_projects","type")){
            Schema::table('service_provider_projects', function (Blueprint $table) {
                $table->string("type")->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
