@extends('layouts.app')

@section('title', isset($news) ? 'Редактировать новость' : 'Новая новость')

@section('content')
<div class="container">
    <div class="admin-form" style="max-width: 800px; margin: 0 auto; padding: 40px 20px;">
        <h1 class="section-title no-animate">{{ isset($news) ? 'Редактировать новость' : 'Новая новость' }}</h1>

        <form action="{{ isset($news) ? route('admin.news.update', $news) : route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($news))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title_ru">Заголовок (RU) *</label>
                        <input type="text" name="title_ru" id="title_ru" value="{{ old('title_ru', $news->title_ru ?? '') }}" required class="form-control">
                        @error('title_ru') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title_en">Заголовок (EN) *</label>
                        <input type="text" name="title_en" id="title_en" value="{{ old('title_en', $news->title_en ?? '') }}" required class="form-control">
                        @error('title_en') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="slug">Slug (для URL, оставьте пустым для автоматической генерации)</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $news->slug ?? '') }}" class="form-control">
                @error('slug') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="content_ru">Содержание (RU) *</label>
                        <textarea name="content_ru" id="content_ru" class="tinymce">{{ old('content_ru', $news->content_ru ?? '') }}</textarea>
                        @error('content_ru') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="content_en">Содержание (EN) *</label>
                        <textarea name="content_en" id="content_en" class="tinymce">{{ old('content_en', $news->content_en ?? '') }}</textarea>
                        @error('content_en') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="published_at">Дата публикации *</label>
                        <input type="date" name="published_at" id="published_at" value="{{ old('published_at', isset($news) ? $news->published_at->format('Y-m-d') : date('Y-m-d')) }}" required class="form-control">
                        @error('published_at') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image">Изображение {{ isset($news) ? '(оставьте пустым, если не меняете)' : '(опционально)' }}</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        @if(isset($news) && $news->image)
                            <div style="margin-top:10px;">
                                <img src="{{ asset('storage/' . $news->image) }}" alt="Текущее изображение" style="max-height: 100px; border-radius: 8px;">
                            </div>
                        @endif
                        @error('image') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn--primary">{{ isset($news) ? 'Обновить' : 'Сохранить' }}</button>
                <a href="{{ route('admin.news.index') }}" class="btn btn--primary">Отмена</a>
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