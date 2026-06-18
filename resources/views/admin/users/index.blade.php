@extends('layouts.app')

@section('title', 'Управление пользователями')

@section('content')
<div class="container">
    <h1 class="section-title no-animate">Пользователи</h1>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Администратор</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->is_admin)
                            <span class="badge badge-confirmed">Да</span>
                        @else
                            <span class="badge badge-new">Нет</span>
                        @endif
                    </td>
                    <td>
                        @if($user->id !== auth()->id())
                            <form action="{{ route('admin.users.update', $user) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="is_admin" value="{{ $user->is_admin ? '0' : '1' }}">
                                <button type="submit" class="btn btn-sm {{ $user->is_admin ? 'btn--danger' : 'btn--primary' }}">
                                    {{ $user->is_admin ? 'Снять права' : 'Назначить админом' }}
                                </button>
                            </form>
                        @else
                            <span style="color: var(--text-dim);">Вы</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Пользователей не найдено</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $users->links() }}
</div>
@endsection