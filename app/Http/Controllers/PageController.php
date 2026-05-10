<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }
    
    public function news()
    {
        return view('pages.news');
    }
    
    public function modelsCategory($category)
    {
        $categories = [
            'sedan' => 'Седаны',
            'coupe' => 'Купе',
            'suv' => 'Кроссоверы и внедорожники',
            'sport' => 'Спортивные модели',
            'electric' => 'Электромобили'
        ];
        
        $title = $categories[$category] ?? 'Модельный ряд';
        
        return view('pages.models-category', compact('title', 'category'));
    }
    
    public function about()
    {
        return view('pages.about');
    }
    
    public function brandHistory()
    {
        return view('pages.brand-history');
    }
    
    public function contacts()
    {
        return view('pages.contacts');
    }
    
    public function testdriveCreate()
    {
        return view('pages.testdrive');
    }
    
    public function sitemap()
    {
        return view('pages.sitemap');
    }
}