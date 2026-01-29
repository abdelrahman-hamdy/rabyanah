@php
    $seoService = app(\App\Services\SeoService::class);
    $pageTitle = __('Search') . ($query ? ' - ' . $query : '') . ' - Rabyanah';
    $pageDescription = __('Search our catalog of premium food products. Find exactly what you are looking for at Rabyanah.');
    $breadcrumbSchema = $seoService->getBreadcrumbSchema([
        ['name' => __('Home'), 'url' => route('home')],
        ['name' => __('Search')],
    ]);
@endphp

{{-- Search pages should not be indexed to avoid duplicate content --}}
<x-layout.app
    :title="$pageTitle"
    :description="$pageDescription"
    :schemas="[$breadcrumbSchema]"
    :noindex="true"
>
    <!-- Hero Section with Archive Hero Component -->
    <x-ui.archive-hero
        :label="__('Find Products')"
        :title="__('Search Products')"
        :subtitle="__('Discover our wide range of premium food products')"
        :breadcrumbs="[['label' => __('Search')]]"
    >
        <!-- Search Form -->
        <div class="max-w-2xl mx-auto mt-10">
            <form method="GET" action="{{ route('search') }}" class="relative">
                <input type="text"
                       name="q"
                       value="{{ $query }}"
                       placeholder="{{ __('What are you looking for?') }}"
                       class="w-full px-6 py-4 pr-14 rtl:pr-6 rtl:pl-14 text-lg rounded-2xl border border-gray-200 bg-white shadow-lg shadow-gray-200/50 focus:ring-2 focus:ring-rabyanah-blue-500/20 focus:border-rabyanah-blue-500 transition-all duration-200"
                       autofocus>
                <button type="submit"
                        class="absolute right-2 rtl:right-auto rtl:left-2 top-1/2 -translate-y-1/2 p-3 bg-rabyanah-blue-600 text-white rounded-xl hover:bg-rabyanah-blue-700 transition-colors shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </form>

            @if($query)
            <p class="text-gray-600 mt-4 text-center">
                {{ __('Showing results for') }} "<span class="font-semibold text-gray-900">{{ $query }}</span>"
            </p>
            @endif
        </div>
    </x-ui.archive-hero>

    <!-- Results Section -->
    <section class="pb-20 md:pb-28" style="background-color: #ffffff; padding-top: 80px;">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Filters Sidebar -->
                <aside class="lg:w-72 flex-shrink-0">
                    <div class="bg-gray-50 rounded-2xl border border-gray-100 p-6 sticky top-28">
                        <h3 class="font-semibold text-gray-900 mb-5 text-lg">{{ __('Filters') }}</h3>

                        <form method="GET" action="{{ route('search') }}" id="filterForm">
                            <input type="hidden" name="q" value="{{ $query }}">

                            <!-- Categories -->
                            @if($categories->count() > 0)
                            <div class="mb-6">
                                <h4 class="text-sm font-medium text-gray-700 mb-3">{{ __('Categories') }}</h4>
                                <div class="space-y-2.5 max-h-48 overflow-y-auto pr-2">
                                    @foreach($categories as $category)
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="radio"
                                               name="category"
                                               value="{{ $category->slug }}"
                                               {{ request('category') === $category->slug ? 'checked' : '' }}
                                               onchange="document.getElementById('filterForm').submit()"
                                               class="w-4 h-4 text-rabyanah-blue-600 border-gray-300 focus:ring-rabyanah-blue-500">
                                        <span class="ml-3 rtl:ml-0 rtl:mr-3 text-sm text-gray-600 group-hover:text-gray-900 transition-colors">
                                            {{ $category->localized_name }}
                                        </span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <!-- Clear Filters -->
                            @if(request('category'))
                            <a href="{{ route('search', ['q' => $query]) }}"
                               class="block w-full text-center px-4 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-200 text-sm font-medium">
                                {{ __('Clear Filters') }}
                            </a>
                            @endif
                        </form>
                    </div>
                </aside>

                <!-- Results -->
                <div class="flex-1">
                    <!-- Results Count -->
                    <div class="flex items-center justify-between mb-8">
                        <p class="text-gray-600">
                            <span class="font-semibold text-gray-900">{{ $products->total() }}</span> {{ __('products found') }}
                        </p>
                    </div>

                    <!-- Products Grid -->
                    @if($products->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 lg:gap-8">
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('No products found') }}</h3>
                        <p class="text-gray-600 mb-8 max-w-md mx-auto">
                            @if($query)
                            {{ __('We couldn\'t find any products matching') }} "{{ $query }}"
                            @else
                            {{ __('Try searching for a product') }}
                            @endif
                        </p>
                        @if($query || request('category'))
                        <a href="{{ route('search') }}"
                           class="inline-flex items-center px-6 py-3 bg-rabyanah-blue-600 text-white font-medium rounded-xl hover:bg-rabyanah-blue-700 transition-all duration-200 shadow-sm hover:shadow-md">
                            <svg class="w-5 h-5 mr-2 rtl:mr-0 rtl:ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            {{ __('Clear Search') }}
                        </a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-layout.app>
