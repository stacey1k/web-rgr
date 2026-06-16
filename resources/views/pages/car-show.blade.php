@extends('layouts.app')

@section('title', 'Audi ' . $car->model)

@section('content')
<div class="container">
    <div class="car-detail">
        <div class="car-detail__header">
            <h1 class="section-title">Audi {{ $car->model }}</h1>
            <div class="car-detail__category">{{ $car->category->name }}</div>
        </div>

        <div class="car-detail__content">
            <div class="car-detail__image">
                <img src="{{ asset('images/car_models/' . $car->main_image) }}" alt="Audi {{ $car->model }}">
            </div>

            <div class="car-detail__description">
                <h2>{{ __('messages.description') }}</h2>
                <p>{{ $car->description }}</p>
            </div>

            <div class="car-detail__specs">
                <h2>{{ __('messages.specifications') }}</h2>
                <ul>
                    <li><strong>{{ __('messages.engine') }}:</strong> {{ $car->engine }}</li>
                    <li><strong>{{ __('messages.horsepower') }}:</strong> {{ $car->horsepower }} {{ __('messages.hp') }}</li>
                    <li><strong>{{ __('messages.acceleration') }}:</strong> {{ $car->acceleration }} {{ __('messages.sec') }}</li>
                    <li><strong>{{ __('messages.fuel_consumption') }}:</strong> {{ $car->fuel_consumption }} {{ __('messages.l_per_100km') }}</li>
                    <li><strong>{{ __('messages.transmission') }}:</strong> {{ $car->transmission }}</li>
                    <li><strong>{{ __('messages.drive') }}:</strong> {{ $car->drive }}</li>
                    <li><strong>{{ __('messages.price') }}:</strong> <span class="price">{{ $car->formatted_price }}</span></li>
                </ul>
            </div>

            <div class="car-detail__actions">
                <a href="{{ route('testdrive.create', ['locale' => app()->getLocale(), 'car' => $car->id]) }}" class="btn btn--primary">{{ __('messages.testdrive_signUp') }}</a>
                <a href="#" class="btn btn--secondary">{{ __('messages.buy') }}</a>
            </div>

            <!-- Галерея дополнительных изображений -->
            @if($car->images->count())
                <div class="car-detail__gallery">
                    <h3>{{ __('messages.gallery') }}</h3>
                    <div class="gallery-grid">
                        @foreach($car->images as $image)
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title ?? __('messages.photo') }}">
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection