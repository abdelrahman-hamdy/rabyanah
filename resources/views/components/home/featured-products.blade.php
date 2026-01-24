@props(['products' => []])

<section class="py-24 lg:py-32 bg-gradient-to-b from-gray-50 to-white overflow-hidden">
    <div class="container mx-auto px-4 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8 mb-16">
            <div class="lg:max-w-2xl">
                <div class="flex items-center space-x-3 rtl:space-x-reverse mb-6" data-animate="fade-right">
                    <div class="w-12 h-[2px] bg-rabyanah-red-500" data-animate="draw-line" data-delay="200"></div>
                    <span class="text-rabyanah-red-600 font-semibold tracking-wide uppercase text-sm">
                        {{ __('Featured Collection') }}
                    </span>
                </div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold font-playfair text-gray-900 leading-tight mb-4" data-animate="fade-up" data-delay="100">
                    {{ __('Premium Quality') }}
                    <span class="text-rabyanah-blue-600">{{ __('Products') }}</span>
                </h2>
                <p class="text-lg text-gray-600 leading-relaxed" data-animate="fade-up" data-delay="200">
                    {{ __('Discover our handpicked selection of premium food products, sourced from the finest suppliers and trusted by partners worldwide.') }}
                </p>
            </div>

            <!-- Navigation Buttons (Desktop) -->
            <div class="hidden lg:flex items-center space-x-3 rtl:space-x-reverse" data-animate="fade-left" data-delay="300">
                <button class="featured-prev w-14 h-14 rounded-full border-2 border-gray-200 flex items-center justify-center text-gray-600 hover:border-rabyanah-blue-600 hover:text-rabyanah-blue-600 hover:bg-rabyanah-blue-50 transition-all duration-300 hover:scale-110">
                    <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button class="featured-next w-14 h-14 rounded-full border-2 border-gray-200 flex items-center justify-center text-gray-600 hover:border-rabyanah-blue-600 hover:text-rabyanah-blue-600 hover:bg-rabyanah-blue-50 transition-all duration-300 hover:scale-110">
                    <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Featured Products Carousel -->
        @if($products->count() > 0)
        <div class="relative" data-animate="fade-up" data-delay="300">
            <div class="swiper featured-swiper">
                <div class="swiper-wrapper pt-4 pb-4">
                    @foreach($products as $index => $product)
                    <div class="swiper-slide">
                        <a href="{{ route('products.show', $product->slug) }}" class="block group bg-white rounded-3xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.06)] hover:shadow-[0_20px_50px_rgb(37,99,235,0.15)] transition-all duration-500 border border-gray-100/50">
                            <!-- Product Image -->
                            <div class="relative aspect-[4/3] overflow-hidden bg-gradient-to-br from-gray-100 to-gray-50">
                                @if($product->image_url)
                                <img src="{{ $product->image_url }}"
                                     alt="{{ $product->localized_name }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                <img src="{{ asset('images/dummy/product' . (($index % 8) + 1) . '.png') }}"
                                     alt="{{ $product->localized_name }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @endif

                                <!-- Hover Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end justify-center pb-8">
                                    <span class="text-white font-medium px-5 py-2 border border-white/60 rounded-full text-sm transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                        {{ __('View Details') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Product Info -->
                            <div class="p-6">
                                <!-- Category & Brand -->
                                <div class="flex items-center justify-between mb-3">
                                    @if($product->category)
                                    <span class="text-xs font-semibold text-rabyanah-blue-600 bg-rabyanah-blue-50 px-3 py-1 rounded-full">
                                        {{ $product->category->localized_name }}
                                    </span>
                                    @endif
                                    @if($product->brand)
                                        @if($product->brand->image_url)
                                        <img src="{{ $product->brand->image_url }}"
                                             alt="{{ $product->brand->name }}"
                                             class="h-6 w-auto object-contain">
                                        @else
                                        <span class="text-xs text-gray-500 font-medium">
                                            {{ $product->brand->name }}
                                        </span>
                                        @endif
                                    @endif
                                </div>

                                <!-- Product Name -->
                                <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-rabyanah-blue-600 transition-colors line-clamp-1">
                                    {{ $product->localized_name }}
                                </h3>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="swiper-pagination !relative mt-8"></div>
            </div>
        </div>
        @else
        <!-- Premium Placeholder with Dummy Images -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" data-animate-grid>
            @for($i = 1; $i <= 3; $i++)
            <div class="group bg-white rounded-3xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.06)] hover:shadow-[0_20px_50px_rgb(37,99,235,0.15)] transition-all duration-500 premium-card border border-gray-100/50">
                <!-- Product Image -->
                <div class="relative aspect-[4/3] overflow-hidden bg-gradient-to-br from-gray-100 to-gray-50">
                    <img src="{{ asset('images/dummy/product' . $i . '.png') }}"
                         alt="Product {{ $i }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">

                    <!-- Hover Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end justify-center pb-8">
                        <span class="text-white font-medium px-5 py-2 border border-white/60 rounded-full text-sm transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            {{ __('View Details') }}
                        </span>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-semibold text-rabyanah-blue-600 bg-rabyanah-blue-50 px-3 py-1 rounded-full">
                            {{ __('Category') }}
                        </span>
                        <span class="text-xs text-gray-500 font-medium">
                            {{ __('Brand') }}
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-rabyanah-blue-600 transition-colors">
                        {{ __('Premium Product') }} {{ $i }}
                    </h3>
                    <p class="text-gray-500 text-sm leading-relaxed line-clamp-2">
                        {{ __('High-quality food product sourced from trusted suppliers.') }}
                    </p>
                </div>
            </div>
            @endfor
        </div>
        @endif

        <!-- See More Link -->
        <div class="text-center mt-12" data-animate="fade-up" data-delay="400">
            <a href="#products"
               class="inline-flex flex-col items-center text-rabyanah-blue-600 font-medium hover:text-rabyanah-blue-700 transition-colors">
                <span>{{ __('See More') }}</span>
                <svg class="w-5 h-5 mt-1 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
            </a>
        </div>
    </div>
</section>
