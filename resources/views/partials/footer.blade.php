<footer class="footer">
    <div class="container">
        <div class="footer__inner">

            <div class="footer__sitemap-wrapper">
                <div class="footer__sitemap">
                    <div class="footer__sitemap-group">
                        <h4>{{ __('messages.company') }}</h4>
                        <ul>
                            <li><a href="{{ route('page.show', ['slug' => 'about', 'locale' => app()->getLocale()]) }}">{{ __('messages.about') }}</a></li>
                            <li><a href="{{ route('page.show', ['slug' => 'brand-history', 'locale' => app()->getLocale()]) }}">{{ __('messages.history') }}</a></li>
                            <li><a href="{{ route('page.show', ['slug' => 'contacts', 'locale' => app()->getLocale()]) }}">{{ __('messages.contacts') }}</a></li>
                        </ul>
                    </div>

                    <div class="footer__sitemap-group">
                        <h4>{{ __('messages.models') }}</h4>
                        <ul>
                            <li><a href="{{ route('models.category', ['category' => 'sedan', 'locale' => app()->getLocale()]) }}">{{ __('messages.sedans') }}</a></li>
                            <li><a href="{{ route('models.category', ['category' => 'coupe', 'locale' => app()->getLocale()]) }}">{{ __('messages.coupe') }}</a></li>
                            <li><a href="{{ route('models.category', ['category' => 'suv', 'locale' => app()->getLocale()]) }}">{{ __('messages.suv_crossovers') }}</a></li>
                            <li><a href="{{ route('models.category', ['category' => 'sport', 'locale' => app()->getLocale()]) }}">{{ __('messages.sport_models') }}</a></li>
                            <li><a href="{{ route('models.category', ['category' => 'electric', 'locale' => app()->getLocale()]) }}">{{ __('messages.electric_models') }}</a></li>
                        </ul>
                    </div>

                    <div class="footer__sitemap-group">
                        <h4>{{ __('messages.for_customers') }}</h4>
                        <ul>
                            <li><a href="{{ route('news', ['locale' => app()->getLocale()]) }}">{{ __('messages.news') }}</a></li>
                            <li><a href="{{ route('testdrive.create', ['locale' => app()->getLocale()]) }}">{{ __('messages.testdrive') }}</a></li>
                        </ul>
                    </div>

                    <div class="footer__sitemap-group">
                        <h4>{{ __('messages.contact_us') }}</h4>
                        <ul>
                            <li><a href="{{ route('page.show', ['slug' => 'contacts', 'locale' => app()->getLocale()]) }}#map">{{ __('messages.contacts_map') }}</a></li>
                            <li><a href="{{ route('page.show', ['slug' => 'contacts', 'locale' => app()->getLocale()]) }}#faq">{{ __('messages.contacts_faq') }}</a></li>
                            <li><a href="{{ route('page.show', ['slug' => 'contacts', 'locale' => app()->getLocale()]) }}#social">{{ __('messages.contacts_social') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer__copyright-wrapper">
                <p class="footer__copyright">{{ __('messages.copyright', ['year' => '2025']) }}</p>
            </div>

        </div>
    </div>
</footer>