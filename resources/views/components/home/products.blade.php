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
        <div x-data="categoryFilter()" class="mb-16" data-animate="fade-up" data-delay="300">
            <div class="flex flex-wrap justify-center gap-3">
                <button @click="setCategory('all')"
                        :class="active === 'all' ? 'bg-rabyanah-blue-600 text-white shadow-lg shadow-rabyanah-blue-600/25' : 'bg-white text-gray-600 hover:text-rabyanah-blue-600 hover:border-rabyanah-blue-200 border border-gray-200'"
                        class="px-6 py-3 rounded-full font-medium transition-all duration-300">
                    {{ __('All Products') }}
                </button>
                @php
                    $displayCategories = $categories->count() > 0 ? $categories->take(5) : collect([
                        (object)['slug' => 'dairy', 'localized_name' => __('Dairy Products')],
                        (object)['slug' => 'grains', 'localized_name' => __('Grains & Cereals')],
                        (object)['slug' => 'oils', 'localized_name' => __('Cooking Oils')],
                        (object)['slug' => 'canned', 'localized_name' => __('Canned Foods')],
                        (object)['slug' => 'beverages', 'localized_name' => __('Beverages')],
                    ]);
                @endphp
                @foreach($displayCategories as $category)
                <button @click="setCategory('{{ $category->slug }}')"
                        :class="active === '{{ $category->slug }}' ? 'bg-rabyanah-blue-600 text-white shadow-lg shadow-rabyanah-blue-600/25' : 'bg-white text-gray-600 hover:text-rabyanah-blue-600 hover:border-rabyanah-blue-200 border border-gray-200'"
                        class="px-6 py-3 rounded-full font-medium transition-all duration-300">
                    {{ $category->localized_name }}
                </button>
                @endforeach
            </div>
        </div>

        <!-- Products Grid -->
        @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8 pt-4" data-animate-grid>
            @foreach($products as $index => $product)
            <div data-category="{{ $product->category?->slug }}" class="transition-all duration-300 opacity-100 scale-100">
                <div class="group bg-white rounded-3xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.06)] hover:shadow-[0_20px_50px_rgb(37,99,235,0.15)] transition-all duration-500 premium-card border border-gray-100/50 h-full">
                    <!-- Product Image -->
                    <div class="relative aspect-[4/3] overflow-hidden bg-gradient-to-br from-gray-100 to-gray-50">
                        <img src="{{ $product->image_url ?: asset('images/dummy/product' . (($index % 8) + 1) . '.png') }}"
                             alt="{{ $product->localized_name }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">

                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end justify-center pb-8">
                            <span class="text-white font-medium px-5 py-2 border border-white/60 rounded-full text-sm transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                {{ __('View Details') }}
                            </span>
                        </div>

                        <!-- Category Badge -->
                        @if($product->category)
                        <div class="absolute top-4 left-4 rtl:left-auto rtl:right-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white/95 backdrop-blur-md text-xs font-semibold text-rabyanah-blue-600 rounded-full shadow-sm">
                                <span class="w-1.5 h-1.5 bg-rabyanah-blue-500 rounded-full"></span>
                                {{ $product->category->localized_name }}
                            </span>
                        </div>
                        @endif
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
        @else
        <!-- Placeholder Grid with Dummy Products -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8 pt-4" data-animate-grid>
            @php
                $dummyProducts = [
                    ['name' => 'Premium Olive Oil', 'category' => 'Cooking Oils', 'brand' => 'Olio Verde'],
                    ['name' => 'Organic Basmati Rice', 'category' => 'Grains & Cereals', 'brand' => 'Golden Harvest'],
                    ['name' => 'Pure Honey', 'category' => 'Natural Products', 'brand' => 'Nature\'s Best'],
                    ['name' => 'Italian Pasta', 'category' => 'Grains & Cereals', 'brand' => 'La Famiglia'],
                    ['name' => 'Greek Yogurt', 'category' => 'Dairy Products', 'brand' => 'Olympus'],
                    ['name' => 'Tomato Sauce', 'category' => 'Canned Foods', 'brand' => 'San Marzano'],
                    ['name' => 'Green Tea', 'category' => 'Beverages', 'brand' => 'Zen Garden'],
                    ['name' => 'Almond Butter', 'category' => 'Natural Products', 'brand' => 'NutriPure'],
                ];
            @endphp
            @foreach($dummyProducts as $index => $product)
            <div data-category="{{ Str::slug($product['category']) }}" class="transition-all duration-300 opacity-100 scale-100">
                <div class="group bg-white rounded-3xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.06)] hover:shadow-[0_20px_50px_rgb(37,99,235,0.15)] transition-all duration-500 premium-card border border-gray-100/50 h-full">
                    <!-- Product Image -->
                    <div class="relative aspect-[4/3] overflow-hidden bg-gradient-to-br from-gray-100 to-gray-50">
                        <img src="{{ asset('images/dummy/product' . ($index + 1) . '.png') }}"
                             alt="{{ $product['name'] }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">

                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end justify-center pb-8">
                            <span class="text-white font-medium px-5 py-2 border border-white/60 rounded-full text-sm transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                {{ __('View Details') }}
                            </span>
                        </div>

                        <!-- Category Badge -->
                        <div class="absolute top-4 left-4 rtl:left-auto rtl:right-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white/95 backdrop-blur-md text-xs font-semibold text-rabyanah-blue-600 rounded-full shadow-sm">
                                <span class="w-1.5 h-1.5 bg-rabyanah-blue-500 rounded-full"></span>
                                {{ __($product['category']) }}
                            </span>
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="p-6">
                        <!-- Category & Brand -->
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-semibold text-rabyanah-blue-600 bg-rabyanah-blue-50 px-3 py-1 rounded-full">
                                {{ __($product['category']) }}
                            </span>
                            <span class="text-xs text-gray-500 font-medium">
                                {{ $product['brand'] }}
                            </span>
                        </div>

                        <!-- Product Name -->
                        <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-rabyanah-blue-600 transition-colors line-clamp-1">
                            {{ __($product['name']) }}
                        </h3>

                        <!-- Short Description -->
                        <p class="text-gray-500 text-sm leading-relaxed line-clamp-2">
                            {{ __('High-quality food product sourced from trusted suppliers.') }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
