<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title_ru');                  // заголовок (рус)
            $table->string('title_en');                  // заголовок (англ)
            $table->string('slug')->unique();            // для ЧПУ
            $table->longText('content_ru');              // текст новости (рус)
            $table->longText('content_en');              // текст новости (англ)
            $table->string('image')->nullable();         // главное фото
            $table->date('published_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
