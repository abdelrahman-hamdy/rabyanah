@props(['products' => [], 'categories' => []])

<section id="products" class="py-24 lg:py-32 bg-gray-50">
    <div class="container mx-auto px-4 lg:px-8">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16" data-animate>
            <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse mb-6">
                <div class="w-12 h-[2px] bg-rabyanah-red-500"></div>
                <span class="text-rabyanah-red-600 font-semibold tracking-wide uppercase text-sm">
                    {{ __('Product Catalog') }}
                </span>
                <div class="w-12 h-[2px] bg-rabyanah-red-500"></div>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold font-playfair text-gray-900 leading-tight mb-4">
                {{ __('Explore Our') }}
                <span class="text-rabyanah-blue-600">{{ __('Collection') }}</span>
            </h2>
            <p class="text-lg text-gray-600 leading-relaxed">
                {{ __('Browse through our extensive range of premium food products, carefully curated for quality and taste.') }}
            </p>
        </div>

        <!-- Category Filters -->
        @if($categories->count() > 0)
        <div x-data="categoryFilter()" class="mb-16" data-animate>
            <div class="flex flex-wrap justify-center gap-3">
                <button @click="setCategory('all')"
                        :class="active === 'all' ? 'bg-rabyanah-blue-600 text-white shadow-lg shadow-rabyanah-blue-600/25' : 'bg-white text-gray-600 hover:text-rabyanah-blue-600 hover:border-rabyanah-blue-200 border border-gray-200'"
                        class="px-6 py-3 rounded-full font-medium transition-all duration-300">
                    {{ __('All Products') }}
                </button>
                @foreach($categories as $category)
                <button @click="setCategory('{{ $category->slug }}')"
                        :class="active === '{{ $category->slug }}' ? 'bg-rabyanah-blue-600 text-white shadow-lg shadow-rabyanah-blue-600/25' : 'bg-white text-gray-600 hover:text-rabyanah-blue-600 hover:border-rabyanah-blue-200 border border-gray-200'"
                        class="px-6 py-3 rounded-full font-medium transition-all duration-300">
                    {{ $category->localized_name }}
                    <span class="ml-1 text-xs opacity-60">({{ $category->products_count ?? 0 }})</span>
                </button>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Products Grid -->
        @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
            @foreach($products as $product)
            <div data-category="{{ $product->category?->slug }}" class="transition-all duration-300 opacity-100 scale-100">
                <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 premium-card h-full">
                    <!-- Product Image -->
                    <div class="relative aspect-square overflow-hidden bg-gradient-to-br from-gray-100 to-gray-50">
                        @if($product->image_url)
                        <img src="{{ $product->image_url }}"
                             alt="{{ $product->localized_name }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 bg-gradient-to-br from-rabyanah-blue-100 to-rabyanah-blue-50 rounded-2xl flex items-center justify-center">
                                <svg class="w-8 h-8 text-rabyanah-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                                </svg>
                            </div>
                        </div>
                        @endif

                        <!-- Category Badge -->
                        @if($product->category)
                        <div class="absolute top-3 left-3 rtl:left-auto rtl:right-3">
                            <span class="inline-block px-3 py-1 bg-white/90 backdrop-blur-sm text-xs font-semibold text-gray-700 rounded-full">
                                {{ $product->category->localized_name }}
                            </span>
                        </div>
                        @endif
                    </div>

                    <!-- Product Info -->
                    <div class="p-5">
                        @if($product->brand)
                        <span class="text-xs text-rabyanah-blue-600 font-medium mb-2 block">
                            {{ $product->brand->localized_name }}
                        </span>
                        @endif

                        <h3 class="font-bold text-gray-900 mb-2 group-hover:text-rabyanah-blue-600 transition-colors line-clamp-1">
                            {{ $product->localized_name }}
                        </h3>

                        @if($product->localized_short_description)
                        <p class="text-gray-500 text-sm line-clamp-2">
                            {{ $product->localized_short_description }}
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center py-20">
            <div class="w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-50 rounded-full mx-auto mb-6 flex items-center justify-center">
                <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-700 mb-2">{{ __('No products yet') }}</h3>
            <p class="text-gray-500">{{ __('Products will appear here once added.') }}</p>
        </div>
        @endif
    </div>
</section>
