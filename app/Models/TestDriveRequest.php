<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestDriveRequest extends Model
{
    protected $fillable = [
        'fio',
        'phone',
        'email',
        'car_id',
        'preferred_date',
        'preferred_time',
        'comment',
        'status',
        'user_id'
    ];
    
    protected $casts = [
        'preferred_date' => 'date',
        'preferred_time' => 'datetime:H:i'
    ];
    
    // Связь: заявка принадлежит машине
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    
    // Связь: заявка принадлежит пользователю (если авторизован)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Статусы для отображения
    public static function getStatuses()
    {
        return [
            'new' => 'Новая',
            'processed' => 'В обработке',
            'confirmed' => 'Подтверждена'
        ];
    }
}