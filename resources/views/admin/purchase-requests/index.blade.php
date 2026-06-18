@extends('layouts.app')

@section('title', 'Заявки на покупку')

@section('content')
<div class="container">
    <h1 class="section-title no-animate">Заявки на покупку</h1>

    <div class="mb-3">
        <a href="{{ route('admin.purchase-requests.index') }}" class="btn btn-sm {{ $status == 'all' ? 'btn--primary' : 'btn--secondary--adm' }}">Все</a>
        <a href="{{ route('admin.purchase-requests.index', ['status' => 'new']) }}" class="btn btn-sm {{ $status == 'new' ? 'btn--primary' : 'btn--secondary--adm' }}">Новые</a>
        <a href="{{ route('admin.purchase-requests.index', ['status' => 'processed']) }}" class="btn btn-sm {{ $status == 'processed' ? 'btn--primary' : 'btn--secondary--adm' }}">Обработаны</a>
    </div>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>ФИО</th>
                <th>Телефон</th>
                <th>Email</th>
                <th>Автомобиль</th>
                <th>Комментарий</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($requests as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->fio }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email }}</td>
                    <td>Audi {{ $item->car->model ?? 'не указана' }}</td>
                    <td>{{ Str::limit($item->comment, 30) ?: '—' }}</td>
                    <td>
                        @if($item->status == 'new')
                            <span class="badge badge-new">Новая</span>
                        @else
                            <span class="badge badge-processed">Обработана</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('admin.purchase-requests.update', $item) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()" class="form-control-sm">
                                <option value="new" {{ $item->status == 'new' ? 'selected' : '' }}>Новая</option>
                                <option value="processed" {{ $item->status == 'processed' ? 'selected' : '' }}>Обработана</option>
                            </select>
                        </form>
                        <a href="{{ route('admin.purchase-requests.show', $item) }}" class="btn btn-sm btn--secondary--adm">Детали</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8" class="text-center">Заявок на покупку пока нет</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $requests->appends(['status' => $status])->links() }}
</div>
@endsection