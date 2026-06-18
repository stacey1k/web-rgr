@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->meta_description)

@section('content')
<div class="container">
    <h1 class="section-title no-animate">{{ $page->title }}</h1>
    <div class="page-content">
        @php
            $content = $page->content;
            // Заменяем маркер [MAP] на iframe с картой
            $mapIframe = '<div class="map-container" style="margin: 20px 0; text-align: center;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2248.067303178678!2d37.63019447738933!3d55.70520187306667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54b48bb6ff89f%3A0x482d1bbef28a4af5!2z0JDQstGC0L7Qt9Cw0LLQvtC00YHQutCw0Y8g0YPQuy4sIDE1LCDQnNC-0YHQutCy0LAsINCg0L7RgdGB0LjRjywgMTE1Mjgw!5e0!3m2!1sru!2sfi!4v1781684424422!5m2!1sru!2sfi"
                    width="100%"
                    height="450"
                    style="border:0; border-radius: 12px;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>';
            $content = str_replace('[MAP]', $mapIframe, $content);
        @endphp

        {!! $content !!}
    </div>

    <!-- @if($page->slug === 'contacts')
        <div class="map-container" style="margin: 30px 0;">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2248.067303178678!2d37.63019447738933!3d55.70520187306667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54b48bb6ff89f%3A0x482d1bbef28a4af5!2z0JDQstGC0L7Qt9Cw0LLQvtC00YHQutCw0Y8g0YPQuy4sIDE1LCDQnNC-0YHQutCy0LAsINCg0L7RgdGB0LjRjywgMTE1Mjgw!5e0!3m2!1sru!2sfi!4v1781684424422!5m2!1sru!2sfi"
                width="600"
                height="450"
                style="border:0; border-radius: 12px;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        </div>
    @endif -->
</div>
@endsection