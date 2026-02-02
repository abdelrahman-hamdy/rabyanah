@props(['products' => [], 'categories' => []])

<section class="py-24 lg:py-32 bg-gray-50">
    <span id="products" class="block" style="position: relative; top: -40px; visibility: hidden;"></span>
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

        <!-- Category Filters & Products Grid with AJAX -->
        <div x-data="catalogFilter()" x-init="init()" class="mb-16">
            <!-- Category Filters -->
            @if($categories->count() > 0)
            <div class="mb-16" data-animate="fade-up" data-delay="300">
                <div class="flex flex-wrap justify-center gap-3">
                    <button @click="loadCategory('all')"
                            :class="active === 'all' ? 'bg-rabyanah-blue-600 text-white shadow-lg shadow-rabyanah-blue-600/25' : 'bg-white text-gray-600 hover:text-rabyanah-blue-600 hover:border-rabyanah-blue-200 border border-gray-200'"
                            :disabled="loading"
                            class="px-6 py-3 rounded-full font-medium transition-all duration-300 disabled:opacity-50">
                        {{ __('All Categories') }}
                    </button>
                    @foreach($categories as $category)
                    <button @click="loadCategory('{{ $category->slug }}')"
                            :class="active === '{{ $category->slug }}' ? 'bg-rabyanah-blue-600 text-white shadow-lg shadow-rabyanah-blue-600/25' : 'bg-white text-gray-600 hover:text-rabyanah-blue-600 hover:border-rabyanah-blue-200 border border-gray-200'"
                            :disabled="loading"
                            class="px-6 py-3 rounded-full font-medium transition-all duration-300 disabled:opacity-50">
                        {{ $category->localized_name }}
                    </button>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Products Grid -->
            <div class="relative min-h-[400px]">
                <!-- Loading Overlay -->
                <div x-show="loading" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="absolute inset-0 bg-gray-50/80 flex items-center justify-center z-10 rounded-2xl">
                    <div class="flex flex-col items-center gap-3">
                        <svg class="animate-spin h-10 w-10 text-rabyanah-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span class="text-gray-600 font-medium">{{ __('Loading...') }}</span>
                    </div>
                </div>

                <!-- Products Container -->
                <div id="products-grid"
                     x-ref="productsGrid"
                     class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8 pt-4"
                     :class="{ 'opacity-50': loading }"
                     data-animate-grid>
                    @foreach($products as $product)
                    <div class="product-item transition-all duration-300">
                        <x-ui.product-card :product="$product" />
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

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

@pushOnce('scripts')
<script>
function catalogFilter() {
    return {
        active: 'all',
        loading: false,
        cache: {},

        init() {
            // Pre-cache the initial 'all' category HTML
            this.cache['all'] = this.$refs.productsGrid.innerHTML;
        },

        async loadCategory(category) {
            if (this.active === category || this.loading) return;

            this.active = category;

            // Check cache first
            if (this.cache[category]) {
                this.$refs.productsGrid.innerHTML = this.cache[category];
                return;
            }

            this.loading = true;

            try {
                const response = await fetch(`{{ route('api.catalog-products') }}?category=${category}`, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (!response.ok) throw new Error('Network response was not ok');

                const data = await response.json();

                // Cache the response
                this.cache[category] = data.html;

                // Update the grid with animation
                this.$refs.productsGrid.style.opacity = '0';
                await new Promise(r => setTimeout(r, 150));

                this.$refs.productsGrid.innerHTML = data.html;

                this.$refs.productsGrid.style.opacity = '1';
            } catch (error) {
                console.error('Error loading products:', error);
            } finally {
                this.loading = false;
            }
        }
    }
}
</script>
@endPushOnce
