@extends('layouts.app')

@section('title', 'Заявка на покупку #' . $request->id)

@section('content')
<div class="container">
    <h1 class="section-title no-animate">Заявка на покупку #{{ $request->id }}</h1>

    <div class="admin-form" style="max-width: 400px; margin: 0 auto;">
        <p><strong>ФИО:</strong> {{ $request->fio }}</p>
        <p><strong>Телефон:</strong> {{ $request->phone }}</p>
        <p><strong>Email:</strong> {{ $request->email }}</p>
        <p><strong>Автомобиль:</strong> Audi {{ $request->car->model ?? 'не указана' }}</p>
        <p><strong>Комментарий:</strong> {{ $request->comment ?: '—' }}</p>
        <p><strong>Статус:</strong> 
            @if($request->status == 'new')
                <span class="badge badge-new">Новая</span>
            @else
                <span class="badge badge-processed">Обработана</span>
            @endif
        </p>

        <form action="{{ route('admin.purchase-requests.update', $request) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="status">Изменить статус</label>
                <select name="status" id="status" class="form-control">
                    <option value="new" {{ $request->status == 'new' ? 'selected' : '' }}>Новая</option>
                    <option value="processed" {{ $request->status == 'processed' ? 'selected' : '' }}>Обработана</option>
                </select>
            </div>
            <button type="submit" class="btn btn--primary">Обновить статус</button>
            <a href="{{ route('admin.purchase-requests.index') }}" class="btn btn--primary">Назад</a>
        </form>
    </div>
</div>
@endsection