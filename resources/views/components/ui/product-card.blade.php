@props(['product'])

<div class="bg-white rounded-2xl shadow-md overflow-hidden group hover:shadow-xl transition-all duration-300">
    <!-- Image Container -->
    <div class="relative aspect-square overflow-hidden bg-gray-100">
        @if($product->image_url)
        <img src="{{ $product->image_url }}"
             alt="{{ $product->localized_name }}"
             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        @else
        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
            <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
        </div>
        @endif

        <!-- Featured Badge -->
        @if($product->is_featured)
        <span class="absolute top-4 left-4 rtl:left-auto rtl:right-4 bg-rabyanah-red-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
            {{ __('Featured') }}
        </span>
        @endif

        <!-- Hover Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <div class="absolute bottom-4 left-4 right-4">
                <a href="#"
                   class="block w-full bg-white text-rabyanah-blue-600 text-center py-2 rounded-lg font-semibold hover:bg-rabyanah-blue-600 hover:text-white transition-colors">
                    {{ __('View Details') }}
                </a>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="p-5">
        <!-- Category -->
        @if($product->category)
        <span class="inline-block text-rabyanah-blue-600 text-sm font-medium mb-2">
            {{ $product->category->localized_name }}
        </span>
        @endif

        <!-- Name -->
        <h3 class="font-semibold text-lg text-gray-900 mb-2 line-clamp-1 group-hover:text-rabyanah-blue-600 transition-colors">
            {{ $product->localized_name }}
        </h3>

        <!-- Description -->
        @if($product->localized_short_description)
        <p class="text-gray-600 text-sm line-clamp-2 mb-3">
            {{ $product->localized_short_description }}
        </p>
        @endif

        <!-- Brand -->
        @if($product->brand)
        <div class="flex items-center space-x-2 rtl:space-x-reverse pt-3 border-t border-gray-100">
            @if($product->brand->logo_url)
            <img src="{{ $product->brand->logo_url }}"
                 alt="{{ $product->brand->localized_name }}"
                 class="w-6 h-6 object-contain">
            @else
            <div class="w-6 h-6 bg-gray-200 rounded-full flex items-center justify-center">
                <span class="text-xs font-bold text-gray-500">{{ substr($product->brand->name, 0, 1) }}</span>
            </div>
            @endif
            <span class="text-sm text-gray-500">{{ $product->brand->localized_name }}</span>
        </div>
        @endif
    </div>
</div>
