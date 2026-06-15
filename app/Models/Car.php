<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'model',
        'category_id',
        'short_description_ru',
        'short_description_en',
        'description_ru',
        'description_en',
        'engine',
        'horsepower',
        'acceleration',
        'fuel_consumption',
        'transmission',
        'drive',
        'price',
        'main_image'
    ];
    
    // Связь: машина принадлежит категории
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    // Связь: у машины много фото
    public function images()
    {
        return $this->hasMany(CarImage::class)->orderBy('sort_order');
    }
    
    // Краткое описание на текущем языке
    public function getShortDescriptionAttribute()
    {
        $locale = app()->getLocale();
        $field = 'short_description_' . $locale;
        return $this->$field;
    }
    
    // Полное описание на текущем языке
    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        $field = 'description_' . $locale;
        return $this->$field;
    }
    
    // Цена с пробелами (для отображения)
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 0, ',', ' ') . ' ₽';
    }
}