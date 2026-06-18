<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\PurchaseRequest;
use Illuminate\Support\Facades\Mail;

class PurchaseController extends Controller
{
    // Показать форму
    public function create($locale, Car $car)
    {
        return view('pages.purchase', compact('car'));
    }

    // Обработать отправку
    public function store(Request $request, $locale, Car $car)
    {
        $validated = $request->validate([
            'fio' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Сохраняем заявку
        $purchaseRequest = PurchaseRequest::create([
            'fio' => $validated['fio'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'car_id' => $car->id,
            'comment' => $validated['comment'] ?? null,
            'user_id' => auth()->id(), // если пользователь авторизован
            'status' => 'new',
        ]);

        // Отправляем email администратору (опционально)
        // Mail::to('admin@example.com')->send(new PurchaseRequestNotification($purchaseRequest));

        // Сообщение об успехе
        return redirect()->route('car.show', ['car' => $car, 'locale' => app()->getLocale()])
                         ->with('success', __('messages.purchase_request_sent'));
    }
}