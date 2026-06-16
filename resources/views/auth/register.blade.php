@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
<div class="container">
    <div class="auth-form" style="max-width: 400px; margin: 0 auto; padding: 40px 0;">
        <h1 class="section-title no-animate">Регистрация</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="form-control">
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group" style="margin-top: 15px;">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="form-control">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group" style="margin-top: 15px;">
                <label for="password">Пароль (минимум 8 символов)</label>
                <input type="password" name="password" id="password" required class="form-control">
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group" style="margin-top: 15px;">
                <label for="password_confirmation">Подтверждение пароля</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="form-control">
            </div>
            <div class="form-group" style="margin-top: 15px;">
                <button type="submit" class="btn btn--primary">Зарегистрироваться</button>
            </div>
        </form>
        <p style="margin-top: 15px;">Уже есть аккаунт? <a href="{{ route('login') }}" class="auth-switch-link">Войти</a></p>
    </div>
</div>
@endsection