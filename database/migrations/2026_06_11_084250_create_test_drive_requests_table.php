<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('test_drive_requests', function (Blueprint $table) {
            $table->id();
            $table->string('fio');
            $table->string('phone');
            $table->string('email');
            $table->foreignId('car_id')->constrained();
            $table->date('preferred_date');
            $table->time('preferred_time');
            $table->text('comment')->nullable();
            $table->enum('status', ['new', 'processed', 'confirmed'])->default('new');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('test_drive_requests');
    }
};
