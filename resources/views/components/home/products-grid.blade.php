@props(['products'])

@forelse($products as $product)
<div class="product-item transition-all duration-300">
    <x-ui.product-card :product="$product" />
</div>
@empty
<div class="col-span-full text-center py-16">
    <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-100 rounded-full mb-6">
        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
        </svg>
    </div>
    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('No Products Found') }}</h3>
    <p class="text-gray-500">{{ __('No products available in this category.') }}</p>
</div>
@endforelse
