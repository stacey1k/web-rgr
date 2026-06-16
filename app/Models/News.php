<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title_ru',
        'title_en',
        'slug',
        'content_ru',
        'content_en',
        'image',
        'published_at'
    ];
    
    protected $casts = [
        'published_at' => 'date'
    ];
    
    // Заголовок на текущем языке
    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        $field = 'title_' . $locale;
        return $this->$field;
    }
    
    // Содержимое на текущем языке
    public function getContentAttribute()
    {
        $locale = app()->getLocale();
        $field = 'content_' . $locale;
        return $this->$field;
    }
}