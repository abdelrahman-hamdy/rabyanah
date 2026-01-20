@props(['slides' => []])

<section id="home" class="relative min-h-screen overflow-hidden">
    <!-- Gradient Background - Very subtle red fading to transparent -->
    <div class="absolute inset-0 bg-gradient-to-b from-rabyanah-red-50 via-rabyanah-red-50/50 to-transparent"></div>

    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <!-- Gradient Orbs - Very subtle with floating animation -->
        <div class="absolute top-0 left-0 w-[800px] h-[800px] bg-rabyanah-red-100/30 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 animate-float-slow"></div>
        <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-rabyanah-red-100/20 rounded-full blur-3xl translate-x-1/3 translate-y-1/3 animate-float-reverse"></div>
        <div class="absolute top-1/2 left-1/2 w-[400px] h-[400px] bg-rabyanah-red-50/30 rounded-full blur-2xl -translate-x-1/2 -translate-y-1/2 animate-pulse-slow"></div>

        <!-- Subtle Grid Pattern -->
        <div class="absolute inset-0 opacity-[0.02]" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23000000\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>

    <!-- Main Content -->
    <div class="relative container mx-auto px-4 lg:px-8 min-h-screen flex items-center">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center py-32 lg:py-0 w-full">
            <!-- Left Content -->
            <div class="text-center lg:text-left rtl:lg:text-right order-2 lg:order-1">
                <!-- Tagline Badge -->
                <div class="hero-title inline-flex items-center space-x-2 rtl:space-x-reverse bg-rabyanah-red-100/50 border border-rabyanah-red-200/50 rounded-full px-5 py-2.5 mb-8">
                    <span class="w-2 h-2 bg-rabyanah-red-500 rounded-full animate-pulse"></span>
                    <span class="text-rabyanah-red-700 text-sm font-medium tracking-wide">{{ __('Global Food Excellence Since 1985') }}</span>
                </div>

                <!-- Main Heading -->
                <h1 class="hero-title font-playfair text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold text-gray-900 leading-[1.1] mb-6" style="animation-delay: 0.1s;">
                    {{ __('Premium Food') }}
                    <span class="block mt-2">
                        <span class="text-rabyanah-red-600">{{ __('Trade Partner') }}</span>
                    </span>
                </h1>

                <!-- Subheading -->
                <p class="hero-subtitle text-lg md:text-xl text-gray-600 leading-relaxed max-w-xl mx-auto lg:mx-0 mb-10">
                    {{ __('Connecting the world\'s finest food brands with markets across the globe. Quality, trust, and excellence in every partnership.') }}
                </p>

                <!-- CTA Buttons -->
                <div class="hero-cta flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 mb-16">
                    <a href="#products"
                       class="group w-full sm:w-auto inline-flex items-center justify-center space-x-3 rtl:space-x-reverse bg-rabyanah-red-600 text-white px-8 py-4 rounded-full font-semibold text-base hover:bg-rabyanah-red-700 transition-all duration-300 shadow-lg shadow-rabyanah-red-600/20 hover:shadow-xl hover:shadow-rabyanah-red-600/30 hover:-translate-y-0.5"
                       data-magnetic="0.2">
                        <span>{{ __('Explore Products') }}</span>
                        <svg class="w-5 h-5 rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="#contact"
                       class="group w-full sm:w-auto inline-flex items-center justify-center space-x-3 rtl:space-x-reverse border-2 border-gray-300 text-gray-700 px-8 py-4 rounded-full font-semibold text-base hover:bg-gray-100 hover:border-gray-400 transition-all duration-300 hover:-translate-y-0.5"
                       data-magnetic="0.2">
                        <span>{{ __('Partner With Us') }}</span>
                    </a>
                </div>

                <!-- Stats Row -->
                <div class="hero-cta grid grid-cols-3 gap-6 lg:gap-10" style="animation-delay: 0.8s;">
                    <div class="text-center lg:text-left rtl:lg:text-right">
                        <div class="text-3xl lg:text-4xl font-bold text-gray-900 mb-1" data-count="40">0+</div>
                        <div class="text-sm text-gray-500 font-medium">{{ __('Years Experience') }}</div>
                    </div>
                    <div class="text-center lg:text-left rtl:lg:text-right border-l border-r border-gray-200 px-4">
                        <div class="text-3xl lg:text-4xl font-bold text-gray-900 mb-1" data-count="50">0+</div>
                        <div class="text-sm text-gray-500 font-medium">{{ __('Global Brands') }}</div>
                    </div>
                    <div class="text-center lg:text-left rtl:lg:text-right">
                        <div class="text-3xl lg:text-4xl font-bold text-gray-900 mb-1" data-count="30">0+</div>
                        <div class="text-sm text-gray-500 font-medium">{{ __('Countries Served') }}</div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Product Image -->
            <div class="relative order-1 lg:order-2 flex items-center justify-center">
                <div class="hero-title" style="animation-delay: 0.3s;">
                    <img src="{{ asset('images/hero-products.png') }}"
                         alt="{{ __('Premium Food Products') }}"
                         class="animate-float drop-shadow-2xl">
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
