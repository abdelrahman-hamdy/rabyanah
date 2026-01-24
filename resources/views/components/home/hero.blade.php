@php
    $isArabic = app()->getLocale() === 'ar';

    // Hero copywriting with fallbacks
    $tagline = $isArabic
        ? \App\Models\SiteSetting::get('hero_tagline_ar', __('Global Food Excellence Since 1990'))
        : \App\Models\SiteSetting::get('hero_tagline', __('Global Food Excellence Since 1990'));

    $titleLine1 = $isArabic
        ? \App\Models\SiteSetting::get('hero_title_line1_ar', __('Premium Food'))
        : \App\Models\SiteSetting::get('hero_title_line1', __('Premium Food'));

    $titleLine2 = $isArabic
        ? \App\Models\SiteSetting::get('hero_title_line2_ar', __('Trade Partner'))
        : \App\Models\SiteSetting::get('hero_title_line2', __('Trade Partner'));

    $subtitle = $isArabic
        ? \App\Models\SiteSetting::get('hero_subtitle_ar', __('Connecting the world\'s finest food brands with markets across the globe. Quality, trust, and excellence in every partnership.'))
        : \App\Models\SiteSetting::get('hero_subtitle', __('Connecting the world\'s finest food brands with markets across the globe. Quality, trust, and excellence in every partnership.'));

    $ctaPrimary = $isArabic
        ? \App\Models\SiteSetting::get('hero_cta_primary_ar', __('Explore Products'))
        : \App\Models\SiteSetting::get('hero_cta_primary', __('Explore Products'));

    $ctaSecondary = $isArabic
        ? \App\Models\SiteSetting::get('hero_cta_secondary_ar', __('Partner With Us'))
        : \App\Models\SiteSetting::get('hero_cta_secondary', __('Partner With Us'));
@endphp

<section id="home" class="relative min-h-screen overflow-hidden">
    <!-- Gradient Background - Very subtle beige fading to transparent -->
    <div class="absolute inset-0 bg-gradient-to-b from-amber-50/80 via-orange-50/40 to-transparent"></div>

    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <!-- Gradient Orbs - Very subtle beige with floating animation -->
        <div class="absolute top-0 left-0 w-[800px] h-[800px] bg-amber-100/30 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 animate-float-slow"></div>
        <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-orange-100/20 rounded-full blur-3xl translate-x-1/3 translate-y-1/3 animate-float-reverse"></div>
        <div class="absolute top-1/2 left-1/2 w-[400px] h-[400px] bg-amber-50/40 rounded-full blur-2xl -translate-x-1/2 -translate-y-1/2 animate-pulse-slow"></div>

        <!-- Subtle Grid Pattern -->
        <div class="absolute inset-0 opacity-[0.02]" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23000000\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>

    <!-- Main Content -->
    <div class="relative container mx-auto px-4 lg:px-8 min-h-screen flex items-center">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center py-32 lg:py-0 w-full">
            <!-- Left Content -->
            <div class="text-center lg:text-left rtl:lg:text-right order-1">
                <!-- Tagline Badge -->
                <div class="hero-title inline-flex items-center space-x-2 rtl:space-x-reverse bg-rabyanah-blue-100/50 border border-rabyanah-blue-200/50 rounded-full px-5 py-2.5 mb-8">
                    <span class="w-2 h-2 bg-rabyanah-blue-500 rounded-full animate-pulse"></span>
                    <span class="text-rabyanah-blue-700 text-sm font-medium tracking-wide">{{ $tagline }}</span>
                </div>

                <!-- Main Heading -->
                <h1 class="hero-title font-playfair text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold text-gray-900 leading-[1.1] mb-6" style="animation-delay: 0.1s;">
                    {{ $titleLine1 }}
                    <span class="block mt-2">
                        <span class="text-rabyanah-red-600">{{ $titleLine2 }}</span>
                    </span>
                </h1>

                <!-- Subheading -->
                <p class="hero-subtitle text-lg md:text-xl text-gray-600 leading-relaxed max-w-xl mx-auto lg:mx-0 mb-10">
                    {{ $subtitle }}
                </p>

                <!-- CTA Buttons -->
                <div class="hero-cta flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 mb-16">
                    <a href="#products"
                       class="w-full sm:w-auto inline-flex items-center justify-center space-x-3 rtl:space-x-reverse bg-rabyanah-red-600 text-white px-8 py-4 rounded-full font-semibold text-base hover:bg-rabyanah-red-700 transition-colors duration-300 shadow-lg shadow-rabyanah-red-600/20">
                        <span>{{ $ctaPrimary }}</span>
                        <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="{{ route('contact') }}"
                       class="w-full sm:w-auto inline-flex items-center justify-center space-x-3 rtl:space-x-reverse border-2 border-gray-300 text-gray-700 px-8 py-4 rounded-full font-semibold text-base hover:bg-gray-100 hover:border-gray-400 transition-colors duration-300">
                        <span>{{ $ctaSecondary }}</span>
                    </a>
                </div>

                <!-- Stats Row -->
                @php
                    $yearsExp = \App\Models\SiteSetting::get('stats_years_experience', '35');
                    $brandsCount = \App\Models\SiteSetting::get('stats_brands_count', '50');
                    $countriesCount = \App\Models\SiteSetting::get('stats_countries_count', '22');
                @endphp
                <div class="hero-cta grid grid-cols-3 gap-6 lg:gap-10" style="animation-delay: 0.8s;">
                    <div class="text-center lg:text-left rtl:lg:text-right">
                        <div class="text-3xl lg:text-4xl font-bold text-gray-900 mb-1" data-count="{{ $yearsExp }}">0+</div>
                        <div class="text-sm text-gray-500 font-medium">{{ __('Years Experience') }}</div>
                    </div>
                    <div class="text-center lg:text-left rtl:lg:text-right border-l border-r border-gray-200 px-4">
                        <div class="text-3xl lg:text-4xl font-bold text-gray-900 mb-1" data-count="{{ $brandsCount }}">0+</div>
                        <div class="text-sm text-gray-500 font-medium">{{ __('Global Brands') }}</div>
                    </div>
                    <div class="text-center lg:text-left rtl:lg:text-right">
                        <div class="text-3xl lg:text-4xl font-bold text-gray-900 mb-1" data-count="{{ $countriesCount }}">0+</div>
                        <div class="text-sm text-gray-500 font-medium">{{ __('Countries Served') }}</div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Animated Product Showcase -->
            <div class="relative order-2 flex items-center justify-center">
                <div class="hero-products-container relative w-full max-w-md lg:max-w-lg xl:max-w-xl h-[400px] lg:h-[500px] xl:h-[550px]">
                    <!-- Decorative Background Glow -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-gradient-radial from-rabyanah-red-100/30 via-amber-50/20 to-transparent rounded-full blur-3xl animate-pulse-slow"></div>

                    <!-- Top Product - Hamz Coffee (Wide, from Top) - Behind others -->
                    <div class="hero-product hero-product-top absolute -top-[2%] left-[50%] w-[55%] z-10"
                         style="transform: translateX(-50%);">
                        <img src="{{ asset('images/hero/hamz-coffe.png') }}"
                             alt="Hamz Coffee"
                             class="w-full h-auto drop-shadow-xl">
                    </div>

                    <!-- Left Product - 5 Star Tune (Tall, from Left) -->
                    <div class="hero-product hero-product-left absolute top-[15%] left-[2%] w-[30%] z-20">
                        <img src="{{ asset('images/hero/5star-tune.png') }}"
                             alt="5 Star Tune"
                             class="w-full h-auto drop-shadow-xl">
                    </div>

                    <!-- Right Product - Leptis Oil (Tall, from Right) -->
                    <div class="hero-product hero-product-right absolute top-[15%] right-[2%] w-[30%] z-20">
                        <img src="{{ asset('images/hero/leptis-oil.png') }}"
                             alt="Leptis Oil"
                             class="w-full h-auto drop-shadow-xl">
                    </div>

                    <!-- Center Product - Cookies (Main Focal) - Front -->
                    <div class="hero-product hero-product-center absolute left-[50%] w-[42%] z-30"
                         style="transform: translateX(-50%); top: 50%;">
                        <img src="{{ asset('images/hero/danis-cookies.png') }}"
                             alt="Danis Cookies"
                             class="w-full h-auto drop-shadow-2xl">
                    </div>

                    <!-- Bottom Product - Nutro Biscuits (Wide, from Bottom) -->
                    <div class="hero-product hero-product-bottom absolute bottom-[2%] left-[50%] w-[65%] z-25"
                         style="transform: translateX(-50%);">
                        <img src="{{ asset('images/hero/nutro-bisciuts.png') }}"
                             alt="Nutro Biscuits"
                             class="w-full h-auto drop-shadow-xl">
                    </div>

                    <!-- Floating Decorative Elements -->
                    <div class="absolute -top-4 -right-4 w-20 h-20 bg-rabyanah-red-500/10 rounded-full blur-xl animate-float-slow"></div>
                    <div class="absolute -bottom-8 -left-8 w-24 h-24 bg-rabyanah-blue-500/10 rounded-full blur-xl animate-float-reverse"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center space-y-2 animate-bounce hero-cta" style="animation-delay: 1.2s;">
        <span class="text-gray-400 text-xs font-medium tracking-widest uppercase">{{ __('Scroll') }}</span>
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </div>
</section>
