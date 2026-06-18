@extends('layouts.app')

@section('title', __('messages.login'))

@section('content')
<div class="container">
    <div class="auth-form" style="max-width: 400px; margin: 0 auto; padding: 40px 0;">
        <h1 class="section-title no-animate">{{ __('messages.login') }}</h1>
        <form method="POST" action="{{ route('login', ['locale' => app()->getLocale()]) }}">
            @csrf
            <div class="form-group">
                <label for="email">{{ __('messages.email') }}</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="form-control">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="password">{{ __('messages.password') }}</label>
                <input type="password" name="password" id="password" required class="form-control">
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn--primary">{{ __('messages.login') }}</button>
            </div>
        </form>
        <p  class="mt-3">{{ __('messages.no_account') }} <a href="{{ route('register', ['locale' => app()->getLocale()]) }}" class="auth-switch-link">{{ __('messages.register') }}</a></p>
    </div>
</div>
@endsection