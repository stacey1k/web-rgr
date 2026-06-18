@extends('layouts.app')

@section('title', 'Управление автомобилями')

@section('content')
<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1 class="section-title no-animate">Автомобили</h1>
        <a href="{{ route('admin.cars.create') }}" class="btn btn--primary">Добавить автомобиль</a>
    </div>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Модель</th>
                <th>Категория</th>
                <th>Цена</th>
                <th>Главное фото</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>Audi {{ $car->model }}</td>
                    <td>{{ $car->category->name_ru ?? '-' }}</td>
                    <td>{{ number_format($car->price, 0, ',', ' ') }} ₽</td>
                    <td>
                        @if($car->main_image)
                            <img src="{{ asset('images/car_models/' . $car->main_image) }}" alt="" style="max-height: 40px; border-radius: 4px;">
                        @else
                            Нет
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-sm btn--secondary--adm">Редактировать</a>
                        <form action="{{ route('admin.cars.destroy', $car) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn--danger" onclick="return confirm('Удалить автомобиль?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">Автомобилей пока нет</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $cars->links() }}
</div>
@endsection