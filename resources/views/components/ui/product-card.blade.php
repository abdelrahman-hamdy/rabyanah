@props([
    'product',
    'showCategory' => true,
])

<a href="{{ route('products.show', $product->slug) }}" class="block h-full">
    <div class="group bg-white rounded-3xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.06)] hover:shadow-[0_20px_50px_rgb(37,99,235,0.15)] transition-all duration-500 border border-gray-100/50 h-full flex flex-col">
        <!-- Product Image -->
        <div class="relative aspect-[4/3] overflow-hidden bg-gradient-to-br from-gray-100 to-gray-50">
            @if($product->image_url)
            <img src="{{ $product->image_url }}"
                 alt="{{ $product->localized_name }}"
                 loading="lazy"
                 decoding="async"
                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
            @else
            <div class="w-full h-full flex items-center justify-center">
                <svg class="w-20 h-20 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            @endif

            <!-- Hover Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end justify-center pb-8">
                <span class="text-white font-medium px-5 py-2 border border-white/60 rounded-full text-sm transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                    {{ __('View Details') }}
                </span>
            </div>

            <!-- Featured Badge -->
            @if($product->is_featured)
            <div class="absolute top-4 left-4 rtl:left-auto rtl:right-4">
                <span class="inline-flex items-center px-3 py-1.5 bg-rabyanah-red-600 text-white text-xs font-semibold rounded-full shadow-sm">
                    {{ __('Featured') }}
                </span>
            </div>
            @endif
        </div>

        <!-- Product Info -->
        <div class="p-6 flex flex-col flex-1">
            <!-- Category -->
            @if($showCategory && $product->category)
            <div class="mb-3">
                <span class="text-xs font-semibold text-rabyanah-blue-600 bg-rabyanah-blue-50 px-3 py-1 rounded-full">
                    {{ $product->category->localized_name }}
                </span>
            </div>
            @endif

            <!-- Product Name -->
            <h3 class="text-lg font-bold text-gray-900 group-hover:text-rabyanah-blue-600 transition-colors line-clamp-1 mb-2">
                {{ $product->localized_name }}
            </h3>

            <!-- Product Description -->
            @if($product->localized_description)
            <p class="text-sm text-gray-500 line-clamp-1 mt-auto">
                {{ $product->localized_description }}
            </p>
            @endif
        </div>
    </div>
</a>
