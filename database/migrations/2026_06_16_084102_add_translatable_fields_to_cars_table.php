<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->string('engine_ru')->nullable()->after('engine');
            $table->string('engine_en')->nullable()->after('engine_ru');
            $table->string('transmission_ru')->nullable()->after('transmission');
            $table->string('transmission_en')->nullable()->after('transmission_ru');
            $table->string('drive_ru')->nullable()->after('drive');
            $table->string('drive_en')->nullable()->after('drive_ru');
        });
    }

    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn([
                'engine_ru', 'engine_en',
                'transmission_ru', 'transmission_en',
                'drive_ru', 'drive_en'
            ]);
        });
    }
};