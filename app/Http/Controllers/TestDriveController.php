<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\TestDriveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestDriveController extends Controller
{
    // Показать форму
    public function create()
    {
        $cars = Car::with('category')->get();
        return view('pages.testdrive', compact('cars'));
    }

    // Обработать отправку
    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'fio' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'preferred_date' => 'required|date|after_or_equal:today',
            'preferred_time' => 'required|date_format:H:i',
            'comment' => 'nullable|string|max:1000',
        ]);

        $testDrive = TestDriveRequest::create([
            'car_id' => $validated['car_id'],
            'fio' => $validated['fio'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'preferred_date' => $validated['preferred_date'],
            'preferred_time' => $validated['preferred_time'],
            'comment' => $validated['comment'] ?? null,
            'user_id' => auth()->id(),
            'status' => 'new',
        ]);

        // Отправка email администратору (опционально)
        // Mail::to('admin@example.com')->send(new TestDriveNotification($testDrive));

        return redirect()->route('home', ['locale' => app()->getLocale()])
                         ->with('success', __('messages.testdrive_request_sent'));
    }
}