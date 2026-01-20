@props(['categories' => []])

@php
    $categoryData = [
        [
            'name' => 'Dairy Products',
            'slug' => 'dairy',
            'image' => 'images/dummy/product1.png',
            'description' => 'Fresh milk, cheese, butter & yogurt',
            'count' => 24,
        ],
        [
            'name' => 'Grains & Cereals',
            'slug' => 'grains',
            'image' => 'images/dummy/product2.png',
            'description' => 'Rice, pasta, flour & oats',
            'count' => 18,
        ],
        [
            'name' => 'Cooking Oils',
            'slug' => 'oils',
            'image' => 'images/dummy/product3.png',
            'description' => 'Olive, sunflower & vegetable oils',
            'count' => 12,
        ],
        [
            'name' => 'Canned Foods',
            'slug' => 'canned',
            'image' => 'images/dummy/product4.png',
            'description' => 'Vegetables, fruits & sauces',
            'count' => 32,
        ],
        [
            'name' => 'Beverages',
            'slug' => 'beverages',
            'image' => 'images/dummy/product5.png',
            'description' => 'Juices, tea, coffee & drinks',
            'count' => 28,
        ],
        [
            'name' => 'Natural Products',
            'slug' => 'natural',
            'image' => 'images/dummy/product6.png',
            'description' => 'Honey, nuts & organic items',
            'count' => 15,
        ],
    ];
@endphp

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

        <!-- Categories Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 lg:gap-6" data-animate-children>
            @foreach($categoryData as $index => $category)
            <a href="#products" class="group relative block">
                <!-- Card Container -->
                <div class="relative aspect-[3/4] rounded-2xl overflow-hidden bg-gradient-to-br from-gray-100 to-gray-50 shadow-[0_8px_30px_rgb(0,0,0,0.08)] hover:shadow-[0_20px_50px_rgb(37,99,235,0.2)] transition-all duration-500">
                    <!-- Background Image -->
                    <img src="{{ asset($category['image']) }}"
                         alt="{{ __($category['name']) }}"
                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-300"></div>

                    <!-- Content -->
                    <div class="absolute inset-0 flex flex-col justify-end p-4 lg:p-5">
                        <!-- Product Count Badge -->
                        <div class="absolute top-3 right-3 rtl:right-auto rtl:left-3">
                            <span class="inline-flex items-center justify-center min-w-[2rem] h-8 px-2 bg-white/95 backdrop-blur-sm text-xs font-bold text-rabyanah-blue-600 rounded-full shadow-sm">
                                {{ $category['count'] }}
                            </span>
                        </div>

                        <!-- Category Name -->
                        <h3 class="text-white font-bold text-base lg:text-lg leading-tight mb-1 group-hover:text-rabyanah-blue-300 transition-colors duration-300">
                            {{ __($category['name']) }}
                        </h3>

                        <!-- Description - Hidden on mobile -->
                        <p class="hidden md:block text-white/70 text-xs leading-relaxed line-clamp-2 transform translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                            {{ __($category['description']) }}
                        </p>

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
            <a href="#products" class="inline-flex items-center gap-2 text-rabyanah-blue-600 hover:text-rabyanah-blue-700 font-semibold transition-all duration-300 group hover:-translate-y-0.5">
                <span>{{ __('View All Categories') }}</span>
                <svg class="w-5 h-5 transform group-hover:translate-x-1 rtl:group-hover:-translate-x-1 rtl:rotate-180 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>
