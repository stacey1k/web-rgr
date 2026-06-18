<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // Берем первый сегмент URL
        $locale = $request->segment(1);
        
        // Если это 'en' или 'ru' — устанавливаем язык
        if (in_array($locale, ['en', 'ru'])) {
            app()->setLocale($locale);
        } else {
            // Русский язык по умолчанию
            app()->setLocale('ru');
        }
        
        return $next($request);
    }
}
