<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'slug',
        'name_ru',
        'name_en',
        'description_ru',
        'description_en',
        'sort_order'
    ];
    
    // Связь: у категории много машин
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
    
    // Получить название категории на текущем языке
    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        $field = 'name_' . $locale;
        return $this->$field;
    }
    
    // Получить описание категории на текущем языке
    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        $field = 'description_' . $locale;
        return $this->$field;
    }
}