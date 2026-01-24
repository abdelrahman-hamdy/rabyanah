<x-layout.app :title="__('Our Brands') . ' - Rabyanah'">
    <!-- Hero Section with Archive Hero Component -->
    <x-ui.archive-hero
        :label="__('Our Partners')"
        :title="__('Premium Brands')"
        :subtitle="__('We partner with the world\'s finest food brands to bring you quality products you can trust.')"
        :breadcrumbs="[['label' => __('Brands')]]"
    />

    <!-- Brands Grid Section -->
    <section class="pb-20 md:pb-28" style="background-color: #ffffff; padding-top: 80px;">
        <div class="container mx-auto px-4 lg:px-8">
            <!-- Results Count -->
            <div class="flex items-center justify-between mb-10">
                <p class="text-gray-600">
                    {{ __('Showing') }} <span class="font-semibold text-gray-900">{{ $brands->count() }}</span> {{ __('brands') }}
                </p>
            </div>

            <!-- Brands Grid -->
            @if($brands->count() > 0)
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 lg:gap-8">
                @foreach($brands as $brand)
                <a href="{{ route('brands.show', $brand) }}"
                   class="group bg-white rounded-2xl border border-gray-100 p-6 lg:p-8 flex flex-col items-center justify-center hover:border-rabyanah-blue-200 hover:shadow-xl hover:shadow-rabyanah-blue-500/10 transition-all duration-300">
                    @if($brand->image_url)
                    <div class="w-24 h-24 md:w-28 md:h-28 flex items-center justify-center mb-4">
                        <img src="{{ $brand->image_url }}"
                             alt="{{ $brand->name }}"
                             class="max-w-full max-h-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300">
                    </div>
                    @else
                    <div class="w-20 h-20 mx-auto bg-rabyanah-blue-100 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-rabyanah-blue-600 transition-colors duration-300">
                        <span class="text-3xl font-bold text-rabyanah-blue-600 group-hover:text-white transition-colors duration-300">
                            {{ substr($brand->name, 0, 1) }}
                        </span>
                    </div>
                    @endif
                    <h3 class="text-base font-semibold text-gray-900 group-hover:text-rabyanah-blue-600 transition-colors text-center mb-2">
                        {{ $brand->name }}
                    </h3>
                    <span class="text-sm text-gray-500">
                        {{ $brand->products_count }} {{ __('products') }}
                    </span>
                </a>
                @endforeach
            </div>
            @else
            <div class="text-center py-20 bg-gray-50 rounded-2xl">
                <svg class="w-20 h-20 text-gray-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('No brands found') }}</h3>
                <p class="text-gray-600 mb-8 max-w-md mx-auto">{{ __('We are currently updating our brand portfolio. Please check back later.') }}</p>
                <a href="{{ route('home') }}"
                   class="inline-flex items-center px-6 py-3 bg-rabyanah-blue-600 text-white font-medium rounded-xl hover:bg-rabyanah-blue-700 transition-all duration-200 shadow-sm hover:shadow-md">
                    <svg class="w-5 h-5 mr-2 rtl:mr-0 rtl:ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    {{ __('Back to Home') }}
                </a>
            </div>
            @endif
        </div>
    </section>
</x-layout.app>
