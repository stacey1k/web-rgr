<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'slug' => 'sedan',
                'name_ru' => 'Седаны',
                'name_en' => 'Sedans',
                'description_ru' => 'Элегантные и динамичные седаны для бизнеса и повседневной жизни.',
                'description_en' => 'Elegant and dynamic sedans for business and everyday life.',
                'sort_order' => 1,
            ],
            [
                'slug' => 'coupe',
                'name_ru' => 'Купе',
                'name_en' => 'Coupe',
                'description_ru' => 'Спортивные купе с захватывающей динамикой.',
                'description_en' => 'Sports coupes with breathtaking dynamics.',
                'sort_order' => 2,
            ],
            [
                'slug' => 'suv',
                'name_ru' => 'Кроссоверы и внедорожники',
                'name_en' => 'SUVs & Crossovers',
                'description_ru' => 'Надёжные и просторные кроссоверы для любых задач.',
                'description_en' => 'Reliable and spacious crossovers for any task.',
                'sort_order' => 3,
            ],
            [
                'slug' => 'sport',
                'name_ru' => 'Спортивные модели',
                'name_en' => 'Sport models',
                'description_ru' => 'Мощные спортивные автомобили для настоящих гонщиков.',
                'description_en' => 'Powerful sports cars for real racers.',
                'sort_order' => 4,
            ],
            [
                'slug' => 'electric',
                'name_ru' => 'Электромобили',
                'name_en' => 'Electric vehicles',
                'description_ru' => 'Инновационные электромобили с заботой об экологии.',
                'description_en' => 'Innovative electric vehicles with care for the environment.',
                'sort_order' => 5,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}