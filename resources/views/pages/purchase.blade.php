@extends('layouts.app')

@section('title', __('messages.buy') . ' Audi ' . $car->model)

@section('content')
<div class="container">
    <div class="purchase-form" style="max-width: 600px; margin: 0 auto; padding: 40px 0;">
        <h1 class="section-title no-animate">{{ __('messages.buy') }} Audi {{ $car->model }}</h1>
        <p class="text-center mb-4">{{ __('messages.purchase_car_description') }}</p>

        <form method="POST" action="{{ route('purchase.store', ['car' => $car->id, 'locale' => app()->getLocale()]) }}">
            @csrf

            <div class="form-group">
                <label for="fio">{{ __('messages.fio') }} *</label>
                <input type="text" name="fio" id="fio" value="{{ old('fio') }}" required class="form-control">
                @error('fio') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mt-3">
                <label for="phone">{{ __('messages.phone') }} *</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required class="form-control">
                @error('phone') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mt-3">
                <label for="email">{{ __('messages.email') }} *</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="form-control">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mt-3">
                <label for="comment">{{ __('messages.comment') }}</label>
                <textarea name="comment" id="comment" rows="4" class="form-control">{{ old('comment') }}</textarea>
                @error('comment') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn--primary" style="flex: 1; text-align: center;">{{ __('messages.send_request') }}</button>
                <a href="{{ route('car.show', ['car' => $car->id, 'locale' => app()->getLocale()]) }}" class="btn btn--primary" style="flex: 1; text-align: center;">{{ __('messages.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection