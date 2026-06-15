<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('cars', function (Blueprint $table) {
        $table->id();
        $table->string('model');                     // "A6", "Q5" (не переводится)
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        
        // Мультиязычные поля
        $table->string('short_description_ru');      // кратко для карточки (рус)
        $table->string('short_description_en');      // кратко для карточки (англ)
        $table->longText('description_ru');          // подробно для страницы (рус)
        $table->longText('description_en');          // подробно для страницы (англ)
        
        // Технические характеристики (не переводятся)
        $table->string('engine');                    // "2.0 TFSI"
        $table->integer('horsepower');               // 249
        $table->decimal('acceleration', 3, 1);       // 6.8
        $table->decimal('fuel_consumption', 4, 1);   // 7.5
        $table->string('transmission');              // "7-ступенчатый S tronic"
        $table->string('drive');                     // "quattro"
        $table->decimal('price', 10, 2);             // цена
        
        // Изображения
        $table->string('main_image');                // главное фото
        
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
