@extends('layouts.app')

@section('title', $title ?? 'Модельный ряд')

@section('content')
<div class="container">
    <h1 class="section-title">{{ $title ?? 'Модельный ряд' }}</h1>
    <p>Категория: {{ $category ?? 'все модели' }}</p>
    <p>Страница в разработке</p>
</div>
@endsection