<div class="product-grid-container">
    <!-- Filters Bar -->
    <div class="bg-gray-50 rounded-2xl border border-gray-100 p-5 md:p-6 mb-10">
        <div class="flex flex-col lg:flex-row items-stretch gap-4">
            <!-- Search -->
            <div class="relative flex-1 min-w-0">
                <input type="text"
                       wire:model.live.debounce.400ms="search"
                       placeholder="{{ __('Search products...') }}"
                       class="w-full h-12 bg-white border border-gray-200 rounded-xl text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-rabyanah-blue-500/20 focus:border-rabyanah-blue-500 transition-all duration-200"
                       style="padding-left: 48px; padding-right: 16px;">
                <svg class="absolute top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" style="left: 14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>

                <!-- Loading indicator in search -->
                <div wire:loading wire:target="search" class="absolute top-1/2 -translate-y-1/2 right-4">
                    <svg class="animate-spin h-5 w-5 text-rabyanah-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </div>

            <!-- Clear Button -->
            @if($search || $category)
            <button wire:click="clearFilters"
                    class="h-12 px-6 bg-white border border-gray-200 text-gray-600 font-medium rounded-xl hover:bg-gray-50 transition-all duration-200 flex items-center justify-center whitespace-nowrap gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                {{ __('Clear') }}
            </button>
            @endif
        </div>
    </div>

    <!-- Results Count with Transition -->
    <div class="flex items-center justify-between mb-8">
        <p class="text-gray-600 transition-all duration-300">
            {{ __('Showing') }}
            <span class="font-semibold text-gray-900" wire:loading.class="opacity-50">{{ count($products) }}</span>
            {{ __('of') }}
            <span class="font-semibold text-gray-900" wire:loading.class="opacity-50">{{ $total }}</span>
            {{ __('products') }}
        </p>
    </div>

    <!-- Products Grid with Stagger Animation -->
    @if(count($products) > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8"
         x-data="{ shown: false }"
         x-init="setTimeout(() => shown = true, 100)">
        @foreach($products as $index => $product)
            <div class="product-card-wrapper"
                 x-data="{ visible: false }"
                 x-init="setTimeout(() => visible = true, {{ ($index % 12) * 50 }})"
                 x-show="visible"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 translate-y-8"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 style="opacity: 0; transform: translateY(2rem);"
                 :style="visible ? 'opacity: 1; transform: translateY(0);' : ''">
                <x-ui.product-card :product="$product" :showCategory="$showCategory" />
            </div>
        @endforeach
    </div>

    <!-- Infinite Scroll Trigger -->
    @if($hasMorePages)
    <div class="mt-12 flex flex-col items-center"
         x-data="{
             loading: false,
             init() {
                 const observer = new IntersectionObserver((entries) => {
                     entries.forEach(entry => {
                         if (entry.isIntersecting && !this.loading) {
                             this.loading = true;
                             $wire.loadMore().then(() => {
                                 this.loading = false;
                             });
                         }
                     });
                 }, { rootMargin: '300px' });
                 observer.observe(this.$el);
             }
         }">
        <!-- Circular Loading Spinner -->
        <div class="flex flex-col items-center gap-4">
            <div class="w-10 h-10 border-4 border-gray-200 border-t-rabyanah-blue-500 rounded-full animate-spin"></div>
            <p class="text-sm text-gray-500">
                {{ count($products) }} / {{ $total }} {{ __('products loaded') }}
            </p>
        </div>
    </div>
    @else
    <!-- All Loaded State -->
    @if(count($products) > 12)
    <div class="mt-12 text-center">
        <div class="inline-flex items-center gap-2 px-6 py-3 bg-green-50 text-green-700 rounded-full">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <span class="font-medium">{{ __('All products loaded') }}</span>
        </div>
    </div>
    @endif
    @endif

    @else
    <!-- Empty State -->
    <div class="text-center py-20 bg-gray-50 rounded-2xl"
         x-data="{ show: false }"
         x-init="setTimeout(() => show = true, 100)"
         x-show="show"
         x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100">
        <svg class="w-20 h-20 text-gray-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
        </svg>
        <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('No products found') }}</h3>
        <p class="text-gray-600 mb-8 max-w-md mx-auto">{{ __('Try adjusting your search or filter criteria to find what you\'re looking for.') }}</p>
        @if($search || $category)
        <button wire:click="clearFilters"
                class="inline-flex items-center px-6 py-3 bg-rabyanah-blue-600 text-white font-medium rounded-xl hover:bg-rabyanah-blue-700 transition-all duration-200 shadow-sm hover:shadow-md">
            <svg class="w-5 h-5 mr-2 rtl:mr-0 rtl:ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            {{ __('Clear Filters') }}
        </button>
        @endif
    </div>
    @endif

    <!-- Initial Loading Skeleton -->
    <div wire:loading.flex wire:target="resetAndReload" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
        @for($i = 0; $i < 8; $i++)
        <div class="animate-pulse">
            <div class="bg-gray-200 rounded-3xl aspect-[4/3]"></div>
            <div class="p-6">
                <div class="h-4 bg-gray-200 rounded w-1/4 mb-3"></div>
                <div class="h-6 bg-gray-200 rounded w-3/4 mb-2"></div>
                <div class="h-4 bg-gray-200 rounded w-1/2"></div>
            </div>
        </div>
        @endfor
    </div>
</div>

<style>
    .product-card-wrapper {
        transition: opacity 0.5s ease-out, transform 0.5s ease-out;
    }
</style>
