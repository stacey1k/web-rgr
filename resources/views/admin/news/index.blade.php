@extends('layouts.app')

@section('title', 'Управление новостями')

@section('content')
<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1 class="section-title no-animate">Новости</h1>
        <a href="{{ route('admin.news.create') }}" class="btn btn--primary">Добавить новость</a>
    </div>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Заголовок (RU)</th>
                <th>Дата</th>
                <th>Изображение</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($news as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title_ru }}</td>
                    <td>{{ $item->published_at->format('d.m.Y') }}</td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="" style="max-height: 40px; border-radius: 4px;">
                        @else
                            Нет
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm btn--secondary--adm">Редактировать</a>
                        <form action="{{ route('admin.news.destroy', $item) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn--danger" onclick="return confirm('Удалить новость?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Новостей пока нет</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $news->links() }}
</div>
@endsection