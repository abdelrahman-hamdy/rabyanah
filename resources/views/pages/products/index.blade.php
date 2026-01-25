<x-layout.app :title="__('Products') . ' - Rabyanah'">
    <!-- Hero Section with Categories -->
    <x-ui.archive-hero
        :label="__('Shop')"
        :title="__('Our Products')"
        :subtitle="__('Discover our complete collection of premium food products from trusted brands worldwide.')"
        :breadcrumbs="[['label' => __('Products')]]"
    >
        <!-- Categories Grid in Hero -->
        @if($categories->count() > 0)
        <div class="mt-12">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 lg:gap-4">
                @foreach($categories as $category)
                <a href="{{ route('products.index', ['category' => $category->slug]) }}#products-section"
                   class="group relative block">
                    <!-- Card Container -->
                    <div class="relative aspect-[4/5] rounded-xl overflow-hidden bg-gradient-to-br from-gray-100 to-gray-50 shadow-[0_4px_15px_rgb(0,0,0,0.06)] hover:shadow-[0_10px_30px_rgb(37,99,235,0.15)] transition-all duration-500 {{ request('category') === $category->slug ? 'border-2 border-rabyanah-blue-500' : '' }}">
                        <!-- Background Image -->
                        @if($category->image_url)
                        <img src="{{ $category->image_url }}"
                             alt="{{ $category->localized_name }}"
                             class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @else
                        <div class="absolute inset-0 bg-gradient-to-br from-rabyanah-blue-100 to-rabyanah-blue-200 flex items-center justify-center">
                            <svg class="w-10 h-10 text-rabyanah-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        @endif

                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-300"></div>

                        <!-- Content -->
                        <div class="absolute inset-0 flex flex-col justify-end p-3">
                            <!-- Product Count Badge -->
                            <div class="absolute top-2 right-2 rtl:right-auto rtl:left-2">
                                <span class="inline-flex items-center justify-center h-6 min-w-6 px-2 bg-white/95 backdrop-blur-sm text-xs font-bold text-rabyanah-blue-600 rounded-full shadow-sm">
                                    {{ $category->products_count }}
                                </span>
                            </div>

                            <!-- Category Name -->
                            <h3 class="text-white font-semibold text-sm leading-tight group-hover:text-rabyanah-blue-300 transition-colors duration-300">
                                {{ $category->localized_name }}
                            </h3>
                        </div>

                        <!-- Active Indicator -->
                        @if(request('category') === $category->slug)
                        <div class="absolute top-2 left-2 rtl:left-auto rtl:right-2">
                            <span class="inline-flex items-center justify-center w-5 h-5 bg-rabyanah-blue-500 text-white rounded-full">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </span>
                        </div>
                        @endif
                    </div>
                </a>
                @endforeach
            </div>

            <!-- View All / Clear Filter -->
            @if(request('category'))
            <div class="text-center mt-6">
                <a href="{{ route('products.index') }}#products-section"
                   class="inline-flex items-center gap-2 text-rabyanah-blue-600 hover:text-rabyanah-blue-700 font-semibold transition-all duration-300 group hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    <span>{{ __('Clear Category Filter') }}</span>
                </a>
            </div>
            @endif
        </div>
        @endif
    </x-ui.archive-hero>

    <!-- Products Section -->
    <section id="products-section" class="pb-20 md:pb-28" style="background-color: #ffffff; padding-top: 80px;">
        <div class="container mx-auto px-4 lg:px-8">
            <!-- Filters Bar -->
            <div class="bg-gray-50 rounded-2xl border border-gray-100 p-5 md:p-6 mb-10">
                <form method="GET" action="{{ route('products.index') }}" class="flex flex-col lg:flex-row items-stretch gap-4">
                    <!-- Search -->
                    <div class="relative flex-1 min-w-0">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="{{ __('Search products...') }}"
                               class="w-full h-12 bg-white border border-gray-200 rounded-xl text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-rabyanah-blue-500/20 focus:border-rabyanah-blue-500 transition-all duration-200"
                               style="padding-left: 48px; padding-right: 16px;">
                        <svg class="absolute top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" style="left: 14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>

                    <!-- Keep category filter if set via hero -->
                    @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif

                    <!-- Buttons Group -->
                    <div class="flex gap-3 flex-shrink-0">
                        <button type="submit"
                                class="h-12 px-6 bg-rabyanah-blue-600 text-white font-medium rounded-xl hover:bg-rabyanah-blue-700 transition-all duration-200 shadow-sm hover:shadow-md whitespace-nowrap">
                            {{ __('Filter') }}
                        </button>

                        @if(request('search') || request('category'))
                        <a href="{{ route('products.index') }}"
                           class="h-12 px-6 bg-white border border-gray-200 text-gray-600 font-medium rounded-xl hover:bg-gray-50 transition-all duration-200 flex items-center justify-center whitespace-nowrap">
                            {{ __('Clear') }}
                        </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Results Count -->
            <div class="flex items-center justify-between mb-8">
                <p class="text-gray-600">
                    {{ __('Showing') }} <span class="font-semibold text-gray-900">{{ $products->total() }}</span> {{ __('products') }}
                    @if(request('category'))
                        @php
                            $activeCategory = $categories->firstWhere('slug', request('category'));
                        @endphp
                        @if($activeCategory)
                        <span class="text-rabyanah-blue-600">{{ __('in') }} {{ $activeCategory->localized_name }}</span>
                        @endif
                    @endif
                </p>
            </div>

            <!-- Products Grid -->
            @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
                @foreach($products as $product)
                <x-ui.product-card :product="$product" />
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $products->links() }}
            </div>
            @else
            <div class="text-center py-20 bg-gray-50 rounded-2xl">
                <svg class="w-20 h-20 text-gray-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('No products found') }}</h3>
                <p class="text-gray-600 mb-8 max-w-md mx-auto">{{ __('Try adjusting your search or filter criteria to find what you\'re looking for.') }}</p>
                <a href="{{ route('products.index') }}"
                   class="inline-flex items-center px-6 py-3 bg-rabyanah-blue-600 text-white font-medium rounded-xl hover:bg-rabyanah-blue-700 transition-all duration-200 shadow-sm hover:shadow-md">
                    <svg class="w-5 h-5 mr-2 rtl:mr-0 rtl:ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    {{ __('Clear Filters') }}
                </a>
            </div>
            @endif
        </div>
    </section>
</x-layout.app>
