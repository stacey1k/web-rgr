@extends('layouts.app')

@section('title', 'Панель администратора')

@section('content')
<div class="container">
    <h1 class="section-title no-animate">Панель администратора</h1>
    <p>Добро пожаловать в админ-панель.</p>

    <div style="display: flex; gap: 20px; margin-top: 30px; flex-wrap: wrap;">
        <a href="{{ route('admin.pages.index') }}" class="btn btn--primary">Управление страницами</a>
        <a href="{{ route('admin.cars.index') }}" class="btn btn--primary">Управление автомобилями</a>
        <a href="{{ route('admin.news.index') }}" class="btn btn--primary">Управление новостями</a>
        <a href="{{ route('admin.test-drive-requests.index') }}" class="btn btn--primary">Заявки на тест-драйв</a>
        <a href="{{ route('admin.purchase-requests.index') }}" class="btn btn--primary">Заявки на покупку</a>
        <a href="{{ route('admin.users.index') }}" class="btn btn--primary">Управление пользователями</a>
    </div>
</div>
@endsection