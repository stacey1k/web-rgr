<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Car;
use App\Models\News;
use App\Models\Page;

class PageController extends Controller
{
    public function home()
    {
        // Получаем популярные модели (например, первые 7 для карусели)
        $popularCars = Car::with('category')->limit(7)->get();
        
        // Получаем последние 3 новости для главной
        $latestNews = News::orderBy('published_at', 'desc')->limit(3)->get();
        
        return view('pages.home', compact('popularCars', 'latestNews'));
    }
    
    public function news()
    {
        // Все новости с пагинацией
        $news = News::orderBy('published_at', 'desc')->paginate(9);
        return view('pages.news', compact('news'));
    }
    
    public function modelsCategory($category, $locale = null)
    {
        if ($locale && in_array($locale, ['en', 'ru'])) {
            app()->setLocale($locale);
        }
        
        // Ищем категорию по slug
        $categoryModel = Category::where('slug', $category)->firstOrFail();
        
        // Получаем машины этой категории
        $cars = Car::where('category_id', $categoryModel->id)->get();
        
        return view('pages.models-category', compact('categoryModel', 'cars'));
    }

    public function carShow($locale, Car $car)
    {
        $car->load('images');
        
        return view('pages.car-show', compact('car'));
    }

    public function newsShow($locale, $slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        return view('pages.news-show', compact('news'));
    }

    public function showPage($locale, $slug)
    {
        $page = Page::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('pages.page', compact('page'));
    }
    
    public function testdriveCreate()
    {
        // Получаем все машины для выбора в форме
        $cars = Car::with('category')->get();
        return view('pages.testdrive', compact('cars'));
    }
}