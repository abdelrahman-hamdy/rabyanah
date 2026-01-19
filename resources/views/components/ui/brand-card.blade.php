@props(['brand'])

<div class="group bg-gray-50 rounded-xl p-6 lg:p-8 flex items-center justify-center hover:bg-white hover:shadow-lg transition-all duration-300 cursor-pointer">
    @if($brand->logo_url)
    <img src="{{ $brand->logo_url }}"
         alt="{{ $brand->localized_name }}"
         class="max-h-16 max-w-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300">
    @else
    <div class="text-center">
        <div class="w-16 h-16 mx-auto bg-rabyanah-blue-100 rounded-full flex items-center justify-center mb-2 group-hover:bg-rabyanah-blue-600 transition-colors">
            <span class="text-2xl font-bold text-rabyanah-blue-600 group-hover:text-white transition-colors">
                {{ substr($brand->name, 0, 1) }}
            </span>
        </div>
        <span class="text-sm font-medium text-gray-600 group-hover:text-rabyanah-blue-600 transition-colors">
            {{ $brand->localized_name }}
        </span>
    </div>
    @endif
</div>
