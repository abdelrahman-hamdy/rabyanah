@php
    $siteLogo = \App\Models\SiteSetting::get('site_logo');
    $logoUrl = $siteLogo ? Storage::url($siteLogo) : asset('images/logo.svg');
@endphp

<header id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500">
    <nav class="container mx-auto px-4 lg:px-8">
        <div class="flex items-center justify-between h-24">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center group">
                <img src="{{ $logoUrl }}"
                     alt="Rabyanah"
                     class="h-14 w-auto transition-all duration-300 nav-logo">
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center">
                <div class="flex items-center space-x-1 rtl:space-x-reverse bg-white/10 backdrop-blur-md rounded-full px-2 py-2 nav-pill">
                    <a href="{{ route('home') }}" class="nav-link px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300">
                        {{ __('Home') }}
                    </a>
                    <a href="{{ route('products.index') }}" class="nav-link px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300">
                        {{ __('Products') }}
                    </a>
                    <a href="{{ route('brands.index') }}" class="nav-link px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300">
                        {{ __('Brands') }}
                    </a>
                    <a href="{{ route('about') }}" class="nav-link px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300">
                        {{ __('About') }}
                    </a>
                    <a href="{{ route('contact') }}" class="nav-link px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300">
                        {{ __('Contact') }}
                    </a>
                </div>
            </div>

            <!-- Right Side Actions -->
            <div class="hidden lg:flex items-center space-x-4 rtl:space-x-reverse">
                <!-- Search Button -->
                <a href="{{ route('search') }}"
                   class="nav-link flex items-center justify-center w-10 h-10 rounded-full transition-all duration-300 hover:bg-white/10"
                   title="{{ __('Search') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </a>

                <!-- Language Switcher -->
                <a href="{{ route('locale.switch', app()->getLocale() === 'ar' ? 'en' : 'ar') }}"
                   class="nav-link flex items-center space-x-2 rtl:space-x-reverse px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 border border-white/20 hover:border-white/40">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                    </svg>
                    <span>{{ app()->getLocale() === 'ar' ? 'EN' : 'العربية' }}</span>
                </a>

                <!-- CTA Button -->
                <a href="{{ route('contact') }}" class="nav-cta group relative overflow-hidden px-7 py-3 rounded-full font-semibold text-sm transition-all duration-300">
                    <span class="relative z-10">{{ __('Get in Touch') }}</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-rabyanah-red-600 to-rabyanah-red-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="lg:hidden p-3 rounded-full nav-link transition-all duration-300">
                <svg class="w-6 h-6 menu-icon-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg class="w-6 h-6 menu-icon-close hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden">
            <div class="bg-white/95 backdrop-blur-xl rounded-3xl mx-4 mb-6 p-6 shadow-2xl border border-gray-100">
                <!-- Mobile Search -->
                <form action="{{ route('search') }}" method="GET" class="mb-4">
                    <div class="relative">
                        <input type="text"
                               name="q"
                               placeholder="{{ __('Search products...') }}"
                               class="w-full pl-10 rtl:pl-4 rtl:pr-10 pr-4 py-3 bg-gray-100 rounded-xl border-0 focus:ring-2 focus:ring-rabyanah-blue-500">
                        <svg class="absolute left-3 rtl:left-auto rtl:right-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </form>

                <div class="flex flex-col space-y-2">
                    <a href="{{ route('home') }}" class="font-medium text-gray-800 hover:text-rabyanah-blue-600 hover:bg-rabyanah-blue-50 px-4 py-3 rounded-xl transition-all duration-300">
                        {{ __('Home') }}
                    </a>
                    <a href="{{ route('products.index') }}" class="font-medium text-gray-800 hover:text-rabyanah-blue-600 hover:bg-rabyanah-blue-50 px-4 py-3 rounded-xl transition-all duration-300">
                        {{ __('Products') }}
                    </a>
                    <a href="{{ route('brands.index') }}" class="font-medium text-gray-800 hover:text-rabyanah-blue-600 hover:bg-rabyanah-blue-50 px-4 py-3 rounded-xl transition-all duration-300">
                        {{ __('Brands') }}
                    </a>
                    <a href="{{ route('about') }}" class="font-medium text-gray-800 hover:text-rabyanah-blue-600 hover:bg-rabyanah-blue-50 px-4 py-3 rounded-xl transition-all duration-300">
                        {{ __('About') }}
                    </a>
                    <a href="{{ route('contact') }}" class="font-medium text-gray-800 hover:text-rabyanah-blue-600 hover:bg-rabyanah-blue-50 px-4 py-3 rounded-xl transition-all duration-300">
                        {{ __('Contact') }}
                    </a>
                </div>
                <div class="mt-6 pt-6 border-t border-gray-100 flex items-center justify-between">
                    <a href="{{ route('locale.switch', app()->getLocale() === 'ar' ? 'en' : 'ar') }}"
                       class="text-gray-600 hover:text-rabyanah-blue-600 font-medium transition-colors">
                        {{ app()->getLocale() === 'ar' ? 'English' : 'العربية' }}
                    </a>
                    <a href="{{ route('contact') }}"
                       class="bg-rabyanah-red-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-rabyanah-red-700 transition-all duration-300">
                        {{ __('Get in Touch') }}
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
