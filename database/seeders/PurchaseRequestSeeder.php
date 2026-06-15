<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PurchaseRequest;
use App\Models\Car;
use Carbon\Carbon;

class PurchaseRequestSeeder extends Seeder
{
    public function run(): void
    {
        // Получаем ID первой машины (A6) и второй (A5 Coupe)
        $carId1 = Car::where('model', 'A6')->first()?->id ?? 1;
        $carId2 = Car::where('model', 'A5 Coupe')->first()?->id ?? 2;
        
        $requests = [
            [
                'fio' => 'Дмитрий Смирнов',
                'phone' => '+7 (903) 456-78-90',
                'email' => 'dmitry@example.com',
                'car_id' => $carId1,
                'comment' => 'Хочу купить Audi A6, нужна консультация по кредиту',
                'status' => 'new',
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fio' => 'Елена Козлова',
                'phone' => '+7 (911) 567-89-01',
                'email' => 'elena@example.com',
                'car_id' => $carId2,
                'comment' => 'Интересует Audi A5 Coupe, рассматриваю трейд-ин',
                'status' => 'processed',
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($requests as $request) {
            PurchaseRequest::create($request);
        }
    }
}