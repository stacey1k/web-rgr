@extends('layouts.app')

@section('title', 'Управление страницами')

@section('content')
<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1 class="section-title">Страницы</h1>
        <a href="{{ route('admin.pages.create') }}" class="btn btn--primary">Создать страницу</a>
    </div>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Заголовок (RU)</th>
                <th>Заголовок (EN)</th>
                <th>Slug</th>
                <th>Активна</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pages as $page)
                <tr>
                    <td>{{ $page->id }}</td>
                    <td>{{ $page->title_ru }}</td>
                    <td>{{ $page->title_en }}</td>
                    <td><code>{{ $page->slug }}</code></td>
                    <td>{{ $page->is_active ? 'Да' : 'Нет' }}</td>
                    <td>
                        <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn--secondary--adm">Редактировать</a>
                        <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn--danger" onclick="return confirm('Удалить страницу?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">Страниц пока нет</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection