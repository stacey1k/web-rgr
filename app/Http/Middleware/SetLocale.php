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
        // Берём первый сегмент URL (например, из /en/news берём 'en')
        $locale = $request->segment(1);
        
        // Если это 'en' или 'ru' — устанавливаем язык
        if (in_array($locale, ['en', 'ru'])) {
            app()->setLocale($locale);
        } else {
            // Если нет — язык русский по умолчанию
            app()->setLocale('ru');
        }
        
        return $next($request);
    }
}
