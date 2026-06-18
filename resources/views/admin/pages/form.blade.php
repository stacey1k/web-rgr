@extends('layouts.app')

@section('title', isset($page) ? 'Редактировать страницу' : 'Новая страница')

@section('content')
<div class="container">
    <div class="admin-form" style="max-width: 600px; margin: 0 auto; padding: 40px 0;">
        <h1 class="section-title no-animate">{{ isset($page) ? 'Редактировать страницу' : 'Создать страницу' }}</h1>

        <form action="{{ isset($page) ? route('admin.pages.update', $page) : route('admin.pages.store') }}" method="POST">
            @csrf
            @if(isset($page))
                @method('PUT')
            @endif

            <!-- SLUG -->
            <div class="form-group">
                <label for="slug">Slug (уникальный идентификатор, латиница)</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $page->slug ?? '') }}" required class="form-control">
                @error('slug') <span class="error">{{ $message }}</span> @enderror
            </div>

            <!-- ЗАГОЛОВКИ -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title_ru">Заголовок (Русский)</label>
                        <input type="text" name="title_ru" id="title_ru" value="{{ old('title_ru', $page->title_ru ?? '') }}" required class="form-control">
                        @error('title_ru') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title_en">Заголовок (English)</label>
                        <input type="text" name="title_en" id="title_en" value="{{ old('title_en', $page->title_en ?? '') }}" required class="form-control">
                        @error('title_en') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- СОДЕРЖИМОЕ (TinyMCE) -->
            <div class="form-group">
                <label for="content_ru">Содержимое (Русский)</label>
                <textarea name="content_ru" id="content_ru" class="tinymce">{{ old('content_ru', $page->content_ru ?? '') }}</textarea>
                @error('content_ru') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="content_en">Содержимое (English)</label>
                <textarea name="content_en" id="content_en" class="tinymce">{{ old('content_en', $page->content_en ?? '') }}</textarea>
                @error('content_en') <span class="error">{{ $message }}</span> @enderror
            </div>

            <!-- META-ОПИСАНИЯ (опционально) -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="meta_description_ru">Meta-описание (RU)</label>
                        <textarea name="meta_description_ru" id="meta_description_ru" class="form-control" rows="2">{{ old('meta_description_ru', $page->meta_description_ru ?? '') }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="meta_description_en">Meta-описание (EN)</label>
                        <textarea name="meta_description_en" id="meta_description_en" class="form-control" rows="2">{{ old('meta_description_en', $page->meta_description_en ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- АКТИВНОСТЬ И ПОРЯДОК -->
            <div class="form-group">
                <label for="is_active">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $page->is_active ?? true) ? 'checked' : '' }}>
                    Активна
                </label>
            </div>
            <div class="form-group">
                <label for="sort_order">Порядок сортировки</label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $page->sort_order ?? 0) }}" class="form-control">
            </div>

            <button type="submit" class="btn btn--primary">{{ isset($page) ? 'Обновить' : 'Сохранить' }}</button>
            <a href="{{ route('admin.pages.index') }}" class="btn btn--primary">Отмена</a>
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
            height: 400,
            menubar: true,
            plugins: 'image link code lists advlist',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | image link code',
            // extended_valid_elements: 'iframe[src|width|height|style|allowfullscreen|loading|referrerpolicy|sandbox]',
            // Настройка загрузки изображений (опционально)
            images_upload_url: '{{ route("admin.upload.image") }}',
            automatic_uploads: true,
            images_upload_credentials: true,
            // Локализация (можно установить русский язык)
            language: '{{ app()->getLocale() == "ru" ? "ru" : "en" }}',
            // Настройка, чтобы стили сохранялись
            content_style: 'body { font-family: Inter, sans-serif; font-size: 16px; }'
        });
    });
</script>
@endpush