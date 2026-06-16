<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TestDriveRequest;
use App\Models\Car;
use Carbon\Carbon;

class TestDriveRequestSeeder extends Seeder
{
    public function run(): void
    {
        // Получаем ID первой машины (A6)
        $carId = Car::first()?->id ?? 1;
        
        $requests = [
            [
                'fio' => 'Иван Иванов',
                'phone' => '+7 (999) 123-45-67',
                'email' => 'ivan@example.com',
                'car_id' => $carId,
                'preferred_date' => Carbon::now()->addDays(3)->toDateString(),
                'preferred_time' => '14:00:00',
                'comment' => 'Хочу протестировать Audi A6',
                'status' => 'new',
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fio' => 'Мария Петрова',
                'phone' => '+7 (916) 234-56-78',
                'email' => 'maria@example.com',
                'car_id' => $carId,
                'preferred_date' => Carbon::now()->addDays(5)->toDateString(),
                'preferred_time' => '11:00:00',
                'comment' => 'Интересует Audi Q5',
                'status' => 'processed',
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fio' => 'Алексей Сидоров',
                'phone' => '+7 (925) 345-67-89',
                'email' => 'alexey@example.com',
                'car_id' => $carId,
                'preferred_date' => Carbon::now()->addDays(7)->toDateString(),
                'preferred_time' => '16:00:00',
                'comment' => 'Хочу сравнить A6 и A8',
                'status' => 'confirmed',
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($requests as $request) {
            TestDriveRequest::create($request);
        }
    }
}