@extends('layouts.app')

@section('title', $news->title)

@section('content')
<div class="container">
    <article class="news-article">
        <h1 class="section-title">{{ $news->title }}</h1>
        
        <div class="news-meta">
            <span class="news-date">{{ $news->published_at->format('d.m.Y') }}</span>
        </div>
        
        @if($news->image)
            <div class="news-image">
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
            </div>
        @endif
        
        <div class="news-content">
            {!! nl2br(e($news->content)) !!}
        </div>
        
        <div class="news-back">
            <a href="{{ route('news', ['locale' => app()->getLocale()]) }}" class="btn btn--secondary">← {{ __('messages.back_to_news') }}</a>
        </div>
    </article>
</div>
@endsection