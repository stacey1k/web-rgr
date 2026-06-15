<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    protected $fillable = [
        'car_id',
        'image_path',
        'title_ru',
        'title_en',
        'sort_order'
    ];
    
    // Связь: фото принадлежит машине
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    
    // Подпись к фото на текущем языке
    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        $field = 'title_' . $locale;
        return $this->$field;
    }
}