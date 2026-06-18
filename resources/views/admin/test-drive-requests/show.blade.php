@extends('layouts.app')

@section('title', 'Заявка #' . $request->id)

@section('content')
<div class="container">
    <h1 class="section-title no-animate">Заявка на тест-драйв #{{ $request->id }}</h1>

    <div class="admin-form" style="max-width: 400px; margin: 0 auto;">
        <p><strong>ФИО:</strong> {{ $request->fio }}</p>
        <p><strong>Телефон:</strong> {{ $request->phone }}</p>
        <p><strong>Email:</strong> {{ $request->email }}</p>
        <p><strong>Автомобиль:</strong> Audi {{ $request->car->model ?? 'не указана' }}</p>
        <p><strong>Дата:</strong> {{ $request->preferred_date->format('d.m.Y') }}</p>
        <p><strong>Время:</strong> {{ $request->preferred_time->format('H:i') }}</p>
        <p><strong>Комментарий:</strong> {{ $request->comment ?: '—' }}</p>
        <p><strong>Статус:</strong> {{ $request->status }}</p>

        <form action="{{ route('admin.test-drive-requests.update', $request) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="status">Изменить статус</label>
                <select name="status" id="status" class="form-control">
                    <option value="new" {{ $request->status == 'new' ? 'selected' : '' }}>Новая</option>
                    <option value="processed" {{ $request->status == 'processed' ? 'selected' : '' }}>В обработке</option>
                    <option value="confirmed" {{ $request->status == 'confirmed' ? 'selected' : '' }}>Подтверждена</option>
                </select>
            </div>
            <button type="submit" class="btn btn--primary">Обновить статус</button>
            <a href="{{ route('admin.test-drive-requests.index') }}" class="btn btn--primary">Назад</a>
        </form>
    </div>
</div>
@endsection