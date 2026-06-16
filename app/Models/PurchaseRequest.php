<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    protected $fillable = [
        'fio',
        'phone',
        'email',
        'car_id',
        'comment',
        'status',
        'user_id'
    ];
    
    // Связь: заявка принадлежит машине
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    
    // Связь: заявка принадлежит пользователю
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Статусы для отображения
    public static function getStatuses()
    {
        return [
            'new' => 'Новая',
            'processed' => 'Обработана'
        ];
    }
}