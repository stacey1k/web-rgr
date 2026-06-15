<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('slug')->unique();           // 'sedan', 'coupe' для URL
        $table->string('name_ru');                   // "Седаны"
        $table->string('name_en');                   // "Sedans"
        $table->text('description_ru')->nullable();  // описание категории на русском
        $table->text('description_en')->nullable();  // описание категории на английском
        $table->integer('sort_order')->default(0);
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
