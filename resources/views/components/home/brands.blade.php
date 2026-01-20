@props(['brands' => []])

@php
    $brandImages = [
        ['src' => 'images/brands/4star-brand-en.png', 'alt' => '4 Star Brand'],
        ['src' => 'images/brands/5star-brand-en.jpeg', 'alt' => '5 Star Brand'],
        ['src' => 'images/brands/al-oud-brand-en.png', 'alt' => 'Al Oud Brand'],
        ['src' => 'images/brands/hamz-brand-en.png', 'alt' => 'Hamz Brand'],
        ['src' => 'images/brands/hamz2-brand-en.png', 'alt' => 'Hamz 2 Brand'],
        ['src' => 'images/brands/hamz-2star-brand-en.jpeg', 'alt' => 'Hamz 2 Star Brand'],
    ];
@endphp

<section id="brands" class="py-24 lg:py-32 bg-white relative overflow-hidden">
    <!-- Decorative Background -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 right-0 w-96 h-96 bg-rabyanah-blue-50 rounded-full blur-3xl opacity-50 translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-rabyanah-red-50 rounded-full blur-3xl opacity-50 -translate-x-1/2 translate-y-1/2"></div>
    </div>

    <div class="container mx-auto px-4 lg:px-8 relative">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse mb-6" data-animate="fade-up">
                <div class="w-12 h-[2px] bg-rabyanah-red-500" data-animate="draw-line" data-delay="200"></div>
                <span class="text-rabyanah-red-600 font-semibold tracking-wide uppercase text-sm">
                    {{ __('Our Partners') }}
                </span>
                <div class="w-12 h-[2px] bg-rabyanah-red-500" data-animate="draw-line" data-delay="200"></div>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold font-playfair text-gray-900 leading-tight mb-4" data-animate="blur-in" data-delay="100">
                {{ __('Trusted By') }}
                <span class="text-rabyanah-blue-600">{{ __('Leading Brands') }}</span>
            </h2>
            <p class="text-lg text-gray-600 leading-relaxed" data-animate="fade-up" data-delay="200">
                {{ __('We partner with world-renowned brands to bring you the finest quality products from around the globe.') }}
            </p>
        </div>
    </div>

    <!-- Infinite Scrolling Brands Carousel -->
    <div class="mb-20 relative" data-animate="fade-up" data-delay="300">
        <!-- Gradient Fade Left -->
        <div class="absolute left-0 top-0 bottom-0 w-32 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none"></div>
        <!-- Gradient Fade Right -->
        <div class="absolute right-0 top-0 bottom-0 w-32 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none"></div>

        <!-- Scrolling Track -->
        <div class="brands-marquee overflow-visible py-4">
            <div class="brands-marquee-track flex items-center gap-12 lg:gap-16">
                <!-- First set of brands -->
                @foreach($brandImages as $brand)
                <div class="flex-shrink-0 group">
                    <div class="bg-white rounded-2xl p-6 lg:p-8 flex items-center justify-center w-48 h-32 lg:w-56 lg:h-36 transition-all duration-200 border border-gray-200 hover:shadow-xl">
                        <img src="{{ asset($brand['src']) }}"
                             alt="{{ $brand['alt'] }}"
                             class="max-h-16 lg:max-h-20 max-w-full object-contain transition-transform duration-200 group-hover:scale-110">
                    </div>
                </div>
                @endforeach
                <!-- Duplicate set for seamless loop -->
                @foreach($brandImages as $brand)
                <div class="flex-shrink-0 group">
                    <div class="bg-white rounded-2xl p-6 lg:p-8 flex items-center justify-center w-48 h-32 lg:w-56 lg:h-36 transition-all duration-200 border border-gray-200 hover:shadow-xl">
                        <img src="{{ asset($brand['src']) }}"
                             alt="{{ $brand['alt'] }}"
                             class="max-h-16 lg:max-h-20 max-w-full object-contain transition-transform duration-200 group-hover:scale-110">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="container mx-auto px-4 lg:px-8 relative">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse mb-6" data-animate="fade-up">
                <div class="w-12 h-[2px] bg-rabyanah-red-500" data-animate="draw-line" data-delay="200"></div>
                <span class="text-rabyanah-red-600 font-semibold tracking-wide uppercase text-sm">
                    {{ __('What We Offer') }}
                </span>
                <div class="w-12 h-[2px] bg-rabyanah-red-500" data-animate="draw-line" data-delay="200"></div>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold font-playfair text-gray-900 leading-tight mb-4" data-animate="blur-in" data-delay="100">
                {{ __('Our') }}
                <span class="text-rabyanah-blue-600">{{ __('Services') }}</span>
            </h2>
            <p class="text-lg text-gray-600 leading-relaxed" data-animate="fade-up" data-delay="200">
                {{ __('Comprehensive solutions to help your brand succeed in global markets.') }}
            </p>
        </div>

        <!-- Services Grid -->
        <div class="grid lg:grid-cols-3 gap-8 pt-6" data-animate-children>
            <!-- Service 1: Shipment -->
            <div class="group relative bg-white rounded-3xl p-8 lg:p-10 border border-gray-200 hover:border-rabyanah-blue-200 shadow-[0_8px_30px_rgb(0,0,0,0.06)] hover:shadow-[0_20px_50px_rgb(37,99,235,0.12)] transition-all duration-300 h-full hover:-translate-y-1">
                <!-- Number Badge -->
                <div class="absolute -top-5 right-8 rtl:right-auto rtl:left-8">
                    <span class="inline-flex items-center justify-center w-10 h-10 bg-rabyanah-blue-600 text-white font-bold rounded-xl shadow-lg shadow-rabyanah-blue-600/30">01</span>
                </div>

                <!-- Decorative Line - Expands on hover -->
                <div class="w-12 group-hover:w-20 h-1 bg-gradient-to-r from-rabyanah-blue-600 to-rabyanah-blue-400 rounded-full mb-6 transition-all duration-300"></div>

                <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-rabyanah-blue-600 transition-colors duration-300">
                    {{ __('Global Shipment') }}
                </h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    {{ __('Reliable worldwide logistics with temperature-controlled shipping, real-time tracking, and customs clearance support. We ensure your products reach any destination safely and on time.') }}
                </p>

                <!-- Features List -->
                <ul class="space-y-3">
                    <li class="flex items-center space-x-3 rtl:space-x-reverse text-sm text-gray-500">
                        <span class="w-1.5 h-1.5 bg-rabyanah-blue-500 rounded-full"></span>
                        <span>{{ __('Door-to-door delivery') }}</span>
                    </li>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse text-sm text-gray-500">
                        <span class="w-1.5 h-1.5 bg-rabyanah-blue-500 rounded-full"></span>
                        <span>{{ __('Cold chain logistics') }}</span>
                    </li>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse text-sm text-gray-500">
                        <span class="w-1.5 h-1.5 bg-rabyanah-blue-500 rounded-full"></span>
                        <span>{{ __('Customs documentation') }}</span>
                    </li>
                </ul>
            </div>

            <!-- Service 2: Private Label -->
            <div class="group relative bg-white rounded-3xl p-8 lg:p-10 border border-gray-200 hover:border-rabyanah-red-200 shadow-[0_8px_30px_rgb(0,0,0,0.06)] hover:shadow-[0_20px_50px_rgb(220,38,38,0.12)] transition-all duration-300 h-full hover:-translate-y-1">
                <!-- Number Badge -->
                <div class="absolute -top-5 right-8 rtl:right-auto rtl:left-8">
                    <span class="inline-flex items-center justify-center w-10 h-10 bg-rabyanah-red-600 text-white font-bold rounded-xl shadow-lg shadow-rabyanah-red-600/30">02</span>
                </div>

                <!-- Decorative Line - Expands on hover -->
                <div class="w-12 group-hover:w-20 h-1 bg-gradient-to-r from-rabyanah-red-600 to-rabyanah-red-400 rounded-full mb-6 transition-all duration-300"></div>

                <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-rabyanah-red-600 transition-colors duration-300">
                    {{ __('Private Label') }}
                </h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    {{ __('Launch your own brand with our complete private label solutions. From product development to packaging design, we help you create a unique identity in the market.') }}
                </p>

                <!-- Features List -->
                <ul class="space-y-3">
                    <li class="flex items-center space-x-3 rtl:space-x-reverse text-sm text-gray-500">
                        <span class="w-1.5 h-1.5 bg-rabyanah-red-500 rounded-full"></span>
                        <span>{{ __('Custom formulations') }}</span>
                    </li>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse text-sm text-gray-500">
                        <span class="w-1.5 h-1.5 bg-rabyanah-red-500 rounded-full"></span>
                        <span>{{ __('Package design') }}</span>
                    </li>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse text-sm text-gray-500">
                        <span class="w-1.5 h-1.5 bg-rabyanah-red-500 rounded-full"></span>
                        <span>{{ __('Quality certification') }}</span>
                    </li>
                </ul>
            </div>

            <!-- Service 3: Marketing -->
            <div class="group relative bg-white rounded-3xl p-8 lg:p-10 border border-gray-200 hover:border-rabyanah-blue-200 shadow-[0_8px_30px_rgb(0,0,0,0.06)] hover:shadow-[0_20px_50px_rgb(37,99,235,0.12)] transition-all duration-300 h-full hover:-translate-y-1">
                <!-- Number Badge -->
                <div class="absolute -top-5 right-8 rtl:right-auto rtl:left-8">
                    <span class="inline-flex items-center justify-center w-10 h-10 bg-rabyanah-blue-600 text-white font-bold rounded-xl shadow-lg shadow-rabyanah-blue-600/30">03</span>
                </div>

                <!-- Decorative Line - Expands on hover -->
                <div class="w-12 group-hover:w-20 h-1 bg-gradient-to-r from-rabyanah-blue-600 to-rabyanah-blue-400 rounded-full mb-6 transition-all duration-300"></div>

                <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-rabyanah-blue-600 transition-colors duration-300">
                    {{ __('Marketing Support') }}
                </h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    {{ __('Strategic marketing solutions to boost your brand visibility. We provide market research, promotional campaigns, and distribution channel development tailored to your target regions.') }}
                </p>

                <!-- Features List -->
                <ul class="space-y-3">
                    <li class="flex items-center space-x-3 rtl:space-x-reverse text-sm text-gray-500">
                        <span class="w-1.5 h-1.5 bg-rabyanah-blue-500 rounded-full"></span>
                        <span>{{ __('Market analysis') }}</span>
                    </li>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse text-sm text-gray-500">
                        <span class="w-1.5 h-1.5 bg-rabyanah-blue-500 rounded-full"></span>
                        <span>{{ __('Brand promotion') }}</span>
                    </li>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse text-sm text-gray-500">
                        <span class="w-1.5 h-1.5 bg-rabyanah-blue-500 rounded-full"></span>
                        <span>{{ __('Distribution network') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
