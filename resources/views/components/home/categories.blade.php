@props(['categories' => collect()])

<section id="categories" class="py-24 lg:py-32 bg-white relative overflow-hidden">
    <!-- Decorative Background -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/2 left-0 w-[500px] h-[500px] bg-rabyanah-blue-50 rounded-full blur-3xl opacity-60 -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute top-1/4 right-0 w-[400px] h-[400px] bg-rabyanah-red-50 rounded-full blur-3xl opacity-50 translate-x-1/2"></div>
    </div>

    <div class="container mx-auto px-4 lg:px-8 relative">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse mb-6" data-animate="fade-up">
                <div class="w-12 h-[2px] bg-rabyanah-red-500" data-animate="draw-line" data-delay="200"></div>
                <span class="text-rabyanah-red-600 font-semibold tracking-wide uppercase text-sm">
                    {{ __('Browse By Category') }}
                </span>
                <div class="w-12 h-[2px] bg-rabyanah-red-500" data-animate="draw-line" data-delay="200"></div>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold font-playfair text-gray-900 leading-tight mb-4" data-animate="blur-in" data-delay="100">
                {{ __('Shop Our') }}
                <span class="text-rabyanah-blue-600">{{ __('Categories') }}</span>
            </h2>
            <p class="text-lg text-gray-600 leading-relaxed" data-animate="fade-up" data-delay="200">
                {{ __('Discover our wide range of premium food products organized by category for easy browsing.') }}
            </p>
        </div>

        @if($categories->count() > 0)
        <!-- Categories Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 lg:gap-6" data-animate-children>
            @foreach($categories as $category)
            <a href="{{ route('categories.show', $category->slug) }}" class="group relative block">
                <!-- Card Container -->
                <div class="relative aspect-[3/4] rounded-2xl overflow-hidden bg-gradient-to-br from-gray-100 to-gray-50 shadow-[0_8px_30px_rgb(0,0,0,0.08)] hover:shadow-[0_20px_50px_rgb(37,99,235,0.2)] transition-all duration-500">
                    <!-- Background Image -->
                    @if($category->image_url)
                    <img src="{{ $category->image_url }}"
                         alt="{{ $category->localized_name }}"
                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    @else
                    <div class="absolute inset-0 bg-gradient-to-br from-rabyanah-blue-100 to-rabyanah-blue-200 flex items-center justify-center">
                        <svg class="w-16 h-16 text-rabyanah-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                    @endif

                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-300"></div>

                    <!-- Product Count Badge - Fixed at top right -->
                    <div class="absolute top-3 right-3 rtl:right-auto rtl:left-3 z-10">
                        <span class="inline-flex items-center justify-center min-w-[2rem] h-8 px-2 bg-white/95 backdrop-blur-sm text-xs font-bold text-rabyanah-blue-600 rounded-full shadow-sm">
                            {{ $category->products_count ?? $category->products()->active()->count() }}
                        </span>
                    </div>

                    <!-- Content -->
                    <div class="absolute inset-x-0 bottom-0 p-4 lg:p-5">
                        <!-- Text Content - Animates up on hover -->
                        <div class="transform group-hover:-translate-y-2 transition-transform duration-300">
                            <!-- Category Name -->
                            <h3 class="text-white font-bold text-base lg:text-lg leading-tight group-hover:text-rabyanah-blue-300 transition-colors duration-300">
                                {{ $category->localized_name }}
                            </h3>

                            <!-- Description - Hidden on mobile, appears on hover -->
                            <p class="hidden md:block text-white/70 text-xs leading-relaxed line-clamp-2 h-0 overflow-hidden opacity-0 group-hover:h-auto group-hover:mt-1 group-hover:opacity-100 transition-all duration-300">
                                {{ $category->localized_description ?? __('Explore our products') }}
                            </p>
                        </div>

                        <!-- Arrow Icon -->
                        <div class="absolute bottom-4 right-4 rtl:right-auto rtl:left-4 w-8 h-8 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center transform translate-x-2 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300">
                            <svg class="w-4 h-4 text-white rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <!-- View All Categories Link -->
        <div class="text-center mt-12" data-animate="scale-up" data-delay="400">
            <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 text-rabyanah-blue-600 hover:text-rabyanah-blue-700 font-semibold transition-all duration-300 group hover:-translate-y-0.5">
                <span>{{ __('View All Products') }}</span>
                <svg class="w-5 h-5 transform group-hover:translate-x-1 rtl:group-hover:-translate-x-1 rtl:rotate-180 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center py-12">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
            </svg>
            <p class="text-gray-500">{{ __('No categories available yet.') }}</p>
        </div>
        @endif
    </div>
</section>
