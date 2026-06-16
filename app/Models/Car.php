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
        'engine_ru',
        'engine_en',
        'horsepower',
        'acceleration',
        'fuel_consumption',
        'transmission',
        'transmission_ru',
        'transmission_en',
        'drive',
        'drive_ru',
        'drive_en',
        'price',
        'main_image',
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

    public function getEngineAttribute()
    {
        $locale = app()->getLocale();
        $field = 'engine_' . $locale;
        return $this->$field ?? $this->engine_ru;
    }

    public function getTransmissionAttribute()
    {
        $locale = app()->getLocale();
        $field = 'transmission_' . $locale;
        return $this->$field ?? $this->transmission_ru;
    }

    public function getDriveAttribute()
    {
        $locale = app()->getLocale();
        $field = 'drive_' . $locale;
        return $this->$field ?? $this->drive_ru;
    }
    
    // Цена с пробелами (для отображения)
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 0, ',', ' ') . ' ₽';
    }
}