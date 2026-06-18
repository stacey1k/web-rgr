@extends('layouts.app')

@section('title', __('messages.testdrive'))

@section('content')
<div class="container">
    <div class="testdrive-form" style="max-width: 600px; margin: 0 auto; padding: 40px 0;">
        <h1 class="section-title no-animate">{{ __('messages.testdrive') }}</h1>
        <p class="text-center mb-4">{{ __('messages.testdrive_description') }}</p>

        <form method="POST" action="{{ route('testdrive.store', ['locale' => app()->getLocale()]) }}">
            @csrf

            <div class="form-group">
                <label for="car_id">{{ __('messages.car') }} *</label>
                <select name="car_id" id="car_id" class="form-control" required>
                    <option value="">{{ __('messages.select_car') }}</option>
                    @foreach($cars as $car)
                        <option value="{{ $car->id }}" {{ old('car_id') == $car->id ? 'selected' : '' }}>
                            Audi {{ $car->model }} ({{ $car->category->name }})
                        </option>
                    @endforeach
                </select>
                @error('car_id') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mt-3">
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
                <label for="preferred_date">{{ __('messages.preferred_date') }} *</label>
                <input type="date" name="preferred_date" id="preferred_date" value="{{ old('preferred_date') }}" required class="form-control">
                @error('preferred_date') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mt-3">
                <label for="preferred_time">{{ __('messages.preferred_time') }} *</label>
                <input type="time" name="preferred_time" id="preferred_time" value="{{ old('preferred_time') }}" required class="form-control">
                @error('preferred_time') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mt-3">
                <label for="comment">{{ __('messages.comment') }}</label>
                <textarea name="comment" id="comment" rows="4" class="form-control">{{ old('comment') }}</textarea>
                @error('comment') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mt-4" style="display: flex; gap: 15px; justify-content: center;">
                <button type="submit" class="btn btn--primary">{{ __('messages.send_request') }}</button>
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="btn btn--primary">{{ __('messages.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection