@extends('layouts.app')

@section('title', 'Вход')

@section('content')
<div class="container">
    <div class="auth-form" style="max-width: 400px; margin: 0 auto; padding: 40px 0;">
        <h1 class="section-title no-animate">Вход</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="form-control">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group" style="margin-top: 15px;">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" required class="form-control">
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group" style="margin-top: 15px;">
                <button type="submit" class="btn btn--primary">Войти</button>
            </div>
        </form>
        <p style="margin-top: 15px;">Нет аккаунта? <a href="{{ route('register') }}" class="auth-switch-link">Зарегистрироваться</a></p>
    </div>
</div>
@endsection