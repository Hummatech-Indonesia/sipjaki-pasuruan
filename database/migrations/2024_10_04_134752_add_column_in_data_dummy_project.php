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
        if(!Schema::hasColumn('dummy_projects', 'tanggal_kontrak')){
            Schema::table('dummy_projects', function (Blueprint $table) {
                $table->date('tanggal_kontrak')->nullable();
            });
        }

        if(!Schema::hasColumn('dummy_projects', 'nama_pelaksana')){
            Schema::table('dummy_projects', function (Blueprint $table) {
                $table->string('nama_pelaksana')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dummy_projects', function (Blueprint $table) {
            //
        });
    }
};
