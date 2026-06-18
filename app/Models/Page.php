<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'title_ru',
        'title_en',
        'content_ru',
        'content_en',
        'meta_description_ru',
        'meta_description_en',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Аксессоры для мультиязычности
    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        $field = 'title_' . $locale;
        return $this->$field;
    }

    public function getContentAttribute()
    {
        $locale = app()->getLocale();
        $field = 'content_' . $locale;
        return $this->$field;
    }

    public function getMetaDescriptionAttribute()
    {
        $locale = app()->getLocale();
        $field = 'meta_description_' . $locale;
        return $this->$field ?? '';
    }
}