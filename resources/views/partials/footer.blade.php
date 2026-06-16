<footer class="footer">
    <div class="container">
        <div class="footer__inner">
            <div class="footer__col">
                <p class="footer__copyright">{{ __('messages.copyright', ['year' => '2025']) }}</p>
            </div>
            <div class="footer__col">
                <ul class="footer__nav">
                    <li><a href="{{ route('sitemap', ['locale' => app()->getLocale()]) }}">{{ __('messages.sitemap') }}</a></li>
                    <li><a href="{{ route('contacts') }}">{{ __('messages.map') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>