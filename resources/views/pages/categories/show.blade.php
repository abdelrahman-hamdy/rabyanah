@php
    $seoService = app(\App\Services\SeoService::class);
    $meta = $seoService->getCategoryMeta($category);
    $breadcrumbSchema = $seoService->getBreadcrumbSchema([
        ['name' => __('Home'), 'url' => route('home')],
        ['name' => __('Products'), 'url' => route('products.index')],
        ['name' => $category->localized_name],
    ]);
    $noindex = request()->has('search') || request()->has('page');
@endphp

<x-layout.app
    :title="$meta['title']"
    :description="$meta['description']"
    :image="$meta['image']"
    :schemas="[$breadcrumbSchema]"
    :noindex="$noindex"
>
    <!-- Hero Section with Archive Hero Component -->
    <x-ui.archive-hero
        :label="__('Category')"
        :title="$category->localized_name"
        :subtitle="$category->localized_description"
        :breadcrumbs="[['label' => __('Products'), 'url' => route('products.index')], ['label' => $category->localized_name]]"
    >
        @if($category->image_url)
        <div class="flex justify-center mt-10">
            <div class="w-36 h-48 md:w-44 md:h-60 lg:w-52 lg:h-72 rounded-2xl overflow-hidden bg-white shadow-xl shadow-gray-200/50 p-3">
                <img src="{{ $category->image_url }}"
                     alt="{{ $category->localized_name }}"
                     class="w-full h-full object-contain">
            </div>
        </div>
        @endif
    </x-ui.archive-hero>

    <!-- Products Section -->
    <section class="pb-20 md:pb-28" style="background-color: #ffffff; padding-top: 80px;">
        <div class="container mx-auto px-4 lg:px-8">
            <!-- Filters Bar -->
            <div class="bg-gray-50 rounded-2xl border border-gray-100 p-5 md:p-6 mb-10">
                <form method="GET" action="{{ route('categories.show', $category->slug) }}" class="flex flex-col lg:flex-row items-stretch gap-4">
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

                    <!-- Buttons Group -->
                    <div class="flex gap-3 flex-shrink-0">
                        <button type="submit"
                                class="h-12 px-6 bg-rabyanah-blue-600 text-white font-medium rounded-xl hover:bg-rabyanah-blue-700 transition-all duration-200 shadow-sm hover:shadow-md whitespace-nowrap">
                            {{ __('Filter') }}
                        </button>

                        @if(request('search'))
                        <a href="{{ route('categories.show', $category->slug) }}"
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
                </p>
            </div>

            <!-- Products Grid -->
            @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
                @foreach($products as $product)
                <x-ui.product-card :product="$product" :showCategory="false" />
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
                <a href="{{ route('categories.show', $category->slug) }}"
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
