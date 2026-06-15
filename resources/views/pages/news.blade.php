@extends('layouts.app')

@section('title', 'Новости и акции')

@section('content')
<div class="container">
    <h1 class="section-title">{{ __('messages.news') }}</h1>
    
    <div class="news-grid">
        @foreach($news as $item)
        <div class="news-card">
            @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
            @endif
            <span class="news-date">{{ $item->published_at->format('d.m.Y') }}</span>
            <h3>{{ $item->title }}</h3>
            <p>{{ Str::limit($item->content, 100) }}</p>
            <a href="{{ route('news.show', ['locale' => app()->getLocale(), 'slug' => $item->slug]) }}" class="btn btn--secondary">{{ __('messages.read_more') }} →</a>
        </div>
        @endforeach
    </div>
    
    @if($news->isEmpty())
        <p class="text-center">Новостей пока нет.</p>
    @endif
    
    <div class="pagination-wrapper">
        {{ $news->links() }}
    </div>
</div>
@endsection