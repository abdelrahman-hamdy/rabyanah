@props(['products' => []])

<section class="py-24 lg:py-32 bg-gradient-to-b from-gray-50 to-white overflow-hidden">
    <div class="container mx-auto px-4 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8 mb-16" data-animate>
            <div class="lg:max-w-2xl">
                <div class="flex items-center space-x-3 rtl:space-x-reverse mb-6">
                    <div class="w-12 h-[2px] bg-rabyanah-red-500"></div>
                    <span class="text-rabyanah-red-600 font-semibold tracking-wide uppercase text-sm">
                        {{ __('Featured Collection') }}
                    </span>
                </div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold font-playfair text-gray-900 leading-tight mb-4">
                    {{ __('Premium Quality') }}
                    <span class="text-rabyanah-blue-600">{{ __('Products') }}</span>
                </h2>
                <p class="text-lg text-gray-600 leading-relaxed">
                    {{ __('Discover our handpicked selection of premium food products, sourced from the finest suppliers and trusted by partners worldwide.') }}
                </p>
            </div>

            <!-- Navigation Buttons (Desktop) -->
            <div class="hidden lg:flex items-center space-x-3 rtl:space-x-reverse">
                <button class="featured-prev w-14 h-14 rounded-full border-2 border-gray-200 flex items-center justify-center text-gray-600 hover:border-rabyanah-blue-600 hover:text-rabyanah-blue-600 hover:bg-rabyanah-blue-50 transition-all duration-300">
                    <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button class="featured-next w-14 h-14 rounded-full border-2 border-gray-200 flex items-center justify-center text-gray-600 hover:border-rabyanah-blue-600 hover:text-rabyanah-blue-600 hover:bg-rabyanah-blue-50 transition-all duration-300">
                    <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Featured Products Carousel -->
        @if($products->count() > 0)
        <div class="relative -mx-4 lg:mx-0">
            <div class="swiper featured-swiper px-4 lg:px-0">
                <div class="swiper-wrapper pb-4">
                    @foreach($products as $product)
                    <div class="swiper-slide">
                        <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 premium-card border border-gray-100">
                            <!-- Product Image -->
                            <div class="relative aspect-[4/3] overflow-hidden bg-gradient-to-br from-gray-100 to-gray-50">
                                @if($product->image_url)
                                <img src="{{ $product->image_url }}"
                                     alt="{{ $product->localized_name }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-20 h-20 bg-gradient-to-br from-rabyanah-blue-100 to-rabyanah-blue-50 rounded-2xl flex items-center justify-center">
                                        <svg class="w-10 h-10 text-rabyanah-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                                        </svg>
                                    </div>
                                </div>
                                @endif

                                <!-- Featured Badge -->
                                @if($product->is_featured)
                                <div class="absolute top-4 left-4 rtl:left-auto rtl:right-4">
                                    <span class="inline-flex items-center px-3 py-1.5 bg-rabyanah-red-500 text-white text-xs font-bold rounded-full shadow-lg">
                                        <svg class="w-3 h-3 mr-1 rtl:ml-1 rtl:mr-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        {{ __('Featured') }}
                                    </span>
                                </div>
                                @endif

                                <!-- Hover Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-rabyanah-blue-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end justify-center pb-6">
                                    <span class="text-white font-semibold px-6 py-2 border-2 border-white rounded-full text-sm transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
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
                                    <span class="text-xs text-gray-500 font-medium">
                                        {{ $product->brand->localized_name }}
                                    </span>
                                    @endif
                                </div>

                                <!-- Product Name -->
                                <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-rabyanah-blue-600 transition-colors line-clamp-1">
                                    {{ $product->localized_name }}
                                </h3>

                                <!-- Short Description -->
                                @if($product->localized_short_description)
                                <p class="text-gray-500 text-sm leading-relaxed line-clamp-2">
                                    {{ $product->localized_short_description }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="swiper-pagination !relative mt-8"></div>
            </div>
        </div>
        @else
        <!-- Premium Placeholder -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @for($i = 0; $i < 3; $i++)
            <div class="bg-white rounded-3xl overflow-hidden border border-gray-100">
                <div class="aspect-[4/3] bg-gradient-to-br from-gray-100 to-gray-50 animate-pulse"></div>
                <div class="p-6 space-y-3">
                    <div class="h-4 bg-gray-100 rounded-full w-1/3"></div>
                    <div class="h-5 bg-gray-100 rounded-full w-3/4"></div>
                    <div class="h-4 bg-gray-100 rounded-full w-full"></div>
                </div>
            </div>
            @endfor
        </div>
        @endif

        <!-- View All Link -->
        <div class="text-center mt-16" data-animate>
            <a href="#products"
               class="group inline-flex items-center space-x-3 rtl:space-x-reverse bg-rabyanah-blue-600 text-white px-8 py-4 rounded-full font-semibold hover:bg-rabyanah-blue-700 transition-all duration-300 shadow-lg shadow-rabyanah-blue-600/25 hover:shadow-xl hover:shadow-rabyanah-blue-600/30">
                <span>{{ __('Explore All Products') }}</span>
                <svg class="w-5 h-5 rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>
