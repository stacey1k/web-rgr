<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $news = [
            [
                'title_ru' => 'Новый Audi A6 e-tron уже в салоне',
                'title_en' => 'New Audi A6 e-tron now in the showroom',
                'slug' => 'new-audi-a6-etron',
                'content_ru' => 'Представляем полностью электрический Audi A6 e-tron. Запас хода до 700 км, мощность 476 л.с. и зарядка до 80% за 20 минут. Спешите на тест-драйв!',
                'content_en' => 'Introducing the fully electric Audi A6 e-tron. Range up to 700 km, 476 hp, and charging to 80% in 20 minutes. Hurry up for a test drive!',
                'image' => 'news/a6-etron.jpg',
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title_ru' => 'Специальные предложения на Audi Q5',
                'title_en' => 'Special offers on Audi Q5',
                'slug' => 'special-offers-audi-q5',
                'content_ru' => 'Только в этом месяце — специальные цены на Audi Q5. Кредит от 0.01% и каско в подарок. Не упустите возможность!',
                'content_en' => 'This month only — special prices on the Audi Q5. Loan from 0.01% and CASCO as a gift. Do not miss the opportunity!',
                'image' => 'news/q5-offer.jpg',
                'published_at' => Carbon::now()->subDays(10),
            ],
            [
                'title_ru' => 'Тест-драйв выходного дня',
                'title_en' => 'Weekend test drive',
                'slug' => 'weekend-test-drive',
                'content_ru' => 'Приглашаем на тест-драйв выходного дня! Любая модель из нашего салона. Запишитесь уже сейчас и получите подарок.',
                'content_en' => 'We invite you to a weekend test drive! Any model from our showroom. Sign up now and get a gift.',
                'image' => 'news/test-drive.jpg',
                'published_at' => Carbon::now()->subDays(15),
            ],
            [
                'title_ru' => 'Audi RS7 — новое поколение',
                'title_en' => 'Audi RS7 — new generation',
                'slug' => 'audi-rs7-new-generation',
                'content_ru' => 'Представляем новое поколение Audi RS7. Ещё мощнее, ещё динамичнее и ещё технологичнее. V8 с мягким гибридным приводом.',
                'content_en' => 'Introducing the new generation of the Audi RS7. Even more powerful, even more dynamic and even more technological. V8 with mild hybrid drive.',
                'image' => 'news/rs7-new.jpg',
                'published_at' => Carbon::now()->subDays(20),
            ],
            [
                'title_ru' => 'Электромобили Audi: будущее уже здесь',
                'title_en' => 'Audi electric vehicles: the future is here',
                'slug' => 'audi-electric-future',
                'content_ru' => 'Вся линейка e-tron теперь доступна для тест-драйва. Узнайте, почему электромобили — это комфортно, выгодно и экологично.',
                'content_en' => 'The entire e-tron line-up is now available for test drive. Find out why electric vehicles are comfortable, profitable and environmentally friendly.',
                'image' => 'news/etron-lineup.jpg',
                'published_at' => Carbon::now()->subDays(25),
            ],
        ];

        foreach ($news as $item) {
            News::create($item);
        }
    }
}