<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('category')->orderBy('id', 'desc')->paginate(15);
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        $categories = Category::orderBy('sort_order')->get();
        return view('admin.cars.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'model' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_description_ru' => 'required|string',
            'short_description_en' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'engine' => 'required|string|max:255',
            'horsepower' => 'required|integer',
            'acceleration' => 'required|numeric',
            'fuel_consumption' => 'required|numeric',
            'transmission' => 'required|string|max:255',
            'drive' => 'required|string|max:255',
            'price' => 'required|numeric',
            'main_image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        // Загрузка изображения
        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $filename = $request->model . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/car_models'), $filename);
            $validated['main_image'] = $filename;
        }

        $car = Car::create($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Автомобиль создан');
    }

    public function edit(Car $car)
    {
        $categories = Category::orderBy('sort_order')->get();
        return view('admin.cars.form', compact('car', 'categories'));
    }

    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'model' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_description_ru' => 'required|string',
            'short_description_en' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'engine' => 'required|string|max:255',
            'horsepower' => 'required|integer',
            'acceleration' => 'required|numeric',
            'fuel_consumption' => 'required|numeric',
            'transmission' => 'required|string|max:255',
            'drive' => 'required|string|max:255',
            'price' => 'required|numeric',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        if ($request->hasFile('main_image')) {
            // Удаляем старое изображение
            if ($car->main_image && file_exists(public_path('images/car_models/' . $car->main_image))) {
                unlink(public_path('images/car_models/' . $car->main_image));
            }
            $file = $request->file('main_image');
            $filename = $request->model . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/car_models'), $filename);
            $validated['main_image'] = $filename;
        }

        $car->update($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Автомобиль обновлён');
    }

    public function destroy(Car $car)
    {
        // Удаляем главное изображение
        if ($car->main_image && file_exists(public_path('images/car_models/' . $car->main_image))) {
            unlink(public_path('images/car_models/' . $car->main_image));
        }
        // Удаляем связанные изображения (если есть таблица car_images)
        // $car->images()->delete();
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Автомобиль удалён');
    }
}