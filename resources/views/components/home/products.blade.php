@props(['products' => [], 'categories' => []])

<section id="products" class="py-24 lg:py-32 bg-gray-50">
    <div class="container mx-auto px-4 lg:px-8">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse mb-6" data-animate="fade-up">
                <div class="w-12 h-[2px] bg-rabyanah-red-500" data-animate="draw-line" data-delay="200"></div>
                <span class="text-rabyanah-red-600 font-semibold tracking-wide uppercase text-sm">
                    {{ __('Product Catalog') }}
                </span>
                <div class="w-12 h-[2px] bg-rabyanah-red-500" data-animate="draw-line" data-delay="200"></div>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold font-playfair text-gray-900 leading-tight mb-4" data-animate="blur-in" data-delay="100">
                {{ __('Explore Our') }}
                <span class="text-rabyanah-blue-600">{{ __('Collection') }}</span>
            </h2>
            <p class="text-lg text-gray-600 leading-relaxed" data-animate="fade-up" data-delay="200">
                {{ __('Browse through our extensive range of premium food products, carefully curated for quality and taste.') }}
            </p>
        </div>

        <!-- Category Filters -->
        @if($categories->count() > 0)
        <div x-data="categoryFilter()" class="mb-16" data-animate="fade-up" data-delay="300">
            <div class="flex flex-wrap justify-center gap-3">
                <button @click="setCategory('all')"
                        :class="active === 'all' ? 'bg-rabyanah-blue-600 text-white shadow-lg shadow-rabyanah-blue-600/25' : 'bg-white text-gray-600 hover:text-rabyanah-blue-600 hover:border-rabyanah-blue-200 border border-gray-200'"
                        class="px-6 py-3 rounded-full font-medium transition-all duration-300">
                    {{ __('All Categories') }}
                </button>
                @foreach($categories->take(5) as $category)
                <button @click="setCategory('{{ $category->slug }}')"
                        :class="active === '{{ $category->slug }}' ? 'bg-rabyanah-blue-600 text-white shadow-lg shadow-rabyanah-blue-600/25' : 'bg-white text-gray-600 hover:text-rabyanah-blue-600 hover:border-rabyanah-blue-200 border border-gray-200'"
                        class="px-6 py-3 rounded-full font-medium transition-all duration-300">
                    {{ $category->localized_name }}
                </button>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Products Grid -->
        @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8 pt-4" data-animate-grid>
            @foreach($products as $product)
            <div data-category="{{ $product->category?->slug }}" class="transition-all duration-300 opacity-100 scale-100">
                <x-ui.product-card :product="$product" />
            </div>
            @endforeach
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center py-16">
            <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-100 rounded-full mb-6">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('No Products Available') }}</h3>
            <p class="text-gray-500">{{ __('Products will be displayed here once they are added.') }}</p>
        </div>
        @endif

        <!-- Explore All Products Button -->
        <div class="text-center mt-16" data-animate="fade-up" data-delay="400">
            <a href="{{ route('products.index') }}"
               class="inline-flex items-center space-x-3 rtl:space-x-reverse px-8 py-4 rounded-full font-semibold border-2 border-gray-200 text-gray-600 hover:border-rabyanah-blue-600 hover:text-rabyanah-blue-600 hover:bg-rabyanah-blue-50 transition-all duration-300">
                <span>{{ __('Explore All Products') }}</span>
                <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>
