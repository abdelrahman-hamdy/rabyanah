@php
    $seoService = app(\App\Services\SeoService::class);
    $searchQuery = request('search', '');
    $pageTitle = __('Search') . ($searchQuery ? ' - ' . $searchQuery : '') . ' - Rabyanah';
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
                       name="search"
                       value="{{ $searchQuery }}"
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

            @if($searchQuery)
            <p class="text-gray-600 mt-4 text-center">
                {{ __('Showing results for') }} "<span class="font-semibold text-gray-900">{{ $searchQuery }}</span>"
            </p>
            @endif
        </div>
    </x-ui.archive-hero>

    <!-- Results Section with Infinite Scroll -->
    <section class="pb-20 md:pb-28" style="background-color: #ffffff; padding-top: 80px;">
        <div class="container mx-auto px-4 lg:px-8">
            <livewire:product-grid :show-category="true" />
        </div>
    </section>
</x-layout.app>
