@extends('layouts.app')

@section('title', isset($car) ? 'Редактировать автомобиль' : 'Новый автомобиль')

@section('content')
<div class="container">
    <div class="admin-form" style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">
        <h1 class="section-title no-animate">{{ isset($car) ? 'Редактировать автомобиль' : 'Новый автомобиль' }}</h1>

        <form action="{{ isset($car) ? route('admin.cars.update', $car) : route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($car))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="model">Модель (например, A6) *</label>
                        <input type="text" name="model" id="model" value="{{ old('model', $car->model ?? '') }}" required class="form-control">
                        @error('model') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category_id">Категория *</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $car->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name_ru }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="short_description_ru">Краткое описание (RU) *</label>
                        <textarea name="short_description_ru" id="short_description_ru" rows="2" class="form-control">{{ old('short_description_ru', $car->short_description_ru ?? '') }}</textarea>
                        @error('short_description_ru') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="short_description_en">Краткое описание (EN) *</label>
                        <textarea name="short_description_en" id="short_description_en" rows="2" class="form-control">{{ old('short_description_en', $car->short_description_en ?? '') }}</textarea>
                        @error('short_description_en') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description_ru">Полное описание (RU) *</label>
                        <textarea name="description_ru" id="description_ru" class="tinymce">{{ old('description_ru', $car->description_ru ?? '') }}</textarea>
                        @error('description_ru') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description_en">Полное описание (EN) *</label>
                        <textarea name="description_en" id="description_en" class="tinymce">{{ old('description_en', $car->description_en ?? '') }}</textarea>
                        @error('description_en') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="engine">Двигатель *</label>
                        <input type="text" name="engine" id="engine" value="{{ old('engine', $car->engine ?? '') }}" required class="form-control">
                        @error('engine') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="horsepower">Мощность (л.с.) *</label>
                        <input type="number" name="horsepower" id="horsepower" value="{{ old('horsepower', $car->horsepower ?? '') }}" required class="form-control">
                        @error('horsepower') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="acceleration">Разгон 0–100 (сек) *</label>
                        <input type="text" name="acceleration" id="acceleration" value="{{ old('acceleration', $car->acceleration ?? '') }}" required class="form-control">
                        @error('acceleration') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fuel_consumption">Расход топлива (л/100 км) *</label>
                        <input type="text" name="fuel_consumption" id="fuel_consumption" value="{{ old('fuel_consumption', $car->fuel_consumption ?? '') }}" required class="form-control">
                        @error('fuel_consumption') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="transmission">Трансмиссия *</label>
                        <input type="text" name="transmission" id="transmission" value="{{ old('transmission', $car->transmission ?? '') }}" required class="form-control">
                        @error('transmission') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="drive">Привод *</label>
                        <input type="text" name="drive" id="drive" value="{{ old('drive', $car->drive ?? '') }}" required class="form-control">
                        @error('drive') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Цена (руб) *</label>
                        <input type="number" name="price" id="price" value="{{ old('price', $car->price ?? '') }}" required class="form-control">
                        @error('price') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="main_image">Главное изображение {{ isset($car) ? '(оставьте пустым, если не меняете)' : '*' }}</label>
                        <input type="file" name="main_image" id="main_image" {{ isset($car) ? '' : 'required' }} class="form-control" accept="image/*">
                        @if(isset($car) && $car->main_image)
                            <div style="margin-top:10px;">
                                <img src="{{ asset('images/car_models/' . $car->main_image) }}" alt="Текущее изображение" style="max-height: 100px; border-radius: 8px;">
                            </div>
                        @endif
                        @error('main_image') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn--primary">{{ isset($car) ? 'Обновить' : 'Сохранить' }}</button>
                <a href="{{ route('admin.cars.index') }}" class="btn btn--primary">Отмена</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<!-- <script src="https://cdn.tiny.cloud/1/dcwz19h9l95ye8cdn7t5ehjpygif1rt7uizmxnhym16q34j7/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->
<script src="{{ asset('js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        tinymce.init({
            selector: '.tinymce',
            license_key: 'gpl',
            height: 300,
            menubar: false,
            plugins: 'link code lists',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link code',
            language: '{{ app()->getLocale() == "ru" ? "ru" : "en" }}',
            content_style: 'body { font-family: Inter, sans-serif; font-size: 16px; }'
        });
    });
</script>
@endpush