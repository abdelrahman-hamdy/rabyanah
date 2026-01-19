@props(['brands' => []])

<section id="brands" class="py-24 lg:py-32 bg-white relative overflow-hidden">
    <!-- Decorative Background -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 right-0 w-96 h-96 bg-rabyanah-blue-50 rounded-full blur-3xl opacity-50 translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-rabyanah-red-50 rounded-full blur-3xl opacity-50 -translate-x-1/2 translate-y-1/2"></div>
    </div>

    <div class="container mx-auto px-4 lg:px-8 relative">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16" data-animate>
            <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse mb-6">
                <div class="w-12 h-[2px] bg-rabyanah-red-500"></div>
                <span class="text-rabyanah-red-600 font-semibold tracking-wide uppercase text-sm">
                    {{ __('Our Partners') }}
                </span>
                <div class="w-12 h-[2px] bg-rabyanah-red-500"></div>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold font-playfair text-gray-900 leading-tight mb-4">
                {{ __('Trusted By') }}
                <span class="text-rabyanah-blue-600">{{ __('Leading Brands') }}</span>
            </h2>
            <p class="text-lg text-gray-600 leading-relaxed">
                {{ __('We partner with world-renowned brands to bring you the finest quality products from around the globe.') }}
            </p>
        </div>

        <!-- Brands Carousel -->
        @if($brands->count() > 0)
        <div class="relative -mx-4 lg:mx-0 mb-20" data-animate>
            <div class="swiper brands-swiper px-4 lg:px-0">
                <div class="swiper-wrapper items-center">
                    @foreach($brands as $brand)
                    <div class="swiper-slide">
                        <div class="group bg-gray-50 hover:bg-white rounded-2xl p-8 lg:p-10 flex items-center justify-center aspect-[4/3] transition-all duration-500 border border-transparent hover:border-gray-100 hover:shadow-xl">
                            @if($brand->logo_url)
                            <img src="{{ $brand->logo_url }}"
                                 alt="{{ $brand->localized_name }}"
                                 class="max-h-16 lg:max-h-20 max-w-full object-contain opacity-40 grayscale group-hover:opacity-100 group-hover:grayscale-0 transition-all duration-500 group-hover:scale-110">
                            @else
                            <div class="text-center">
                                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-rabyanah-blue-100 to-rabyanah-blue-50 rounded-2xl flex items-center justify-center mb-3 group-hover:from-rabyanah-blue-600 group-hover:to-rabyanah-blue-700 transition-all duration-500 group-hover:shadow-lg group-hover:shadow-rabyanah-blue-600/25">
                                    <span class="text-3xl font-bold text-rabyanah-blue-600 group-hover:text-white transition-colors duration-500">
                                        {{ substr($brand->name, 0, 1) }}
                                    </span>
                                </div>
                                <span class="text-sm font-semibold text-gray-500 group-hover:text-rabyanah-blue-600 transition-colors">
                                    {{ $brand->localized_name }}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @else
        <!-- Premium Placeholder -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 mb-20" data-animate>
            @for($i = 0; $i < 6; $i++)
            <div class="bg-gray-50 rounded-2xl p-8 flex items-center justify-center aspect-square">
                <div class="w-16 h-16 bg-gray-100 rounded-2xl animate-pulse"></div>
            </div>
            @endfor
        </div>
        @endif

        <!-- Trust Statistics -->
        <div class="relative" data-animate>
            <div class="bg-gradient-to-r from-rabyanah-blue-600 via-rabyanah-blue-700 to-rabyanah-blue-800 rounded-3xl p-8 lg:p-12 overflow-hidden">
                <!-- Decorative Elements -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>

                <div class="relative grid grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-white/10 rounded-2xl mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div class="text-4xl lg:text-5xl font-bold text-white mb-2" data-count="50">0+</div>
                        <div class="text-white/70 font-medium">{{ __('Partner Brands') }}</div>
                    </div>

                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-white/10 rounded-2xl mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="text-4xl lg:text-5xl font-bold text-white mb-2" data-count="30">0+</div>
                        <div class="text-white/70 font-medium">{{ __('Countries Served') }}</div>
                    </div>

                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-white/10 rounded-2xl mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                            </svg>
                        </div>
                        <div class="text-4xl lg:text-5xl font-bold text-white mb-2" data-count="500">0+</div>
                        <div class="text-white/70 font-medium">{{ __('Products') }}</div>
                    </div>

                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-white/10 rounded-2xl mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="text-4xl lg:text-5xl font-bold text-white mb-2" data-count="40">0+</div>
                        <div class="text-white/70 font-medium">{{ __('Years Experience') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Certification Badges -->
        <div class="mt-16 flex flex-wrap items-center justify-center gap-6 lg:gap-10" data-animate>
            <div class="flex items-center space-x-3 rtl:space-x-reverse px-6 py-3 bg-gray-50 rounded-full">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
                <span class="font-semibold text-gray-700">ISO 22000</span>
            </div>
            <div class="flex items-center space-x-3 rtl:space-x-reverse px-6 py-3 bg-gray-50 rounded-full">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
                <span class="font-semibold text-gray-700">HACCP</span>
            </div>
            <div class="flex items-center space-x-3 rtl:space-x-reverse px-6 py-3 bg-gray-50 rounded-full">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
                <span class="font-semibold text-gray-700">{{ __('Halal Certified') }}</span>
            </div>
            <div class="flex items-center space-x-3 rtl:space-x-reverse px-6 py-3 bg-gray-50 rounded-full">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
                <span class="font-semibold text-gray-700">GMP</span>
            </div>
        </div>
    </div>
</section>
