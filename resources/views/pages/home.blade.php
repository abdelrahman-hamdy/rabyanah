<x-layout.app :title="__('Rabyanah - Global Food Trade Company')">
    {{-- Hero Section --}}
    <x-home.hero :slides="$heroSlides" />

    {{-- Featured Products Section --}}
    <x-home.featured-products :products="$featuredProducts" />

    {{-- About Section --}}
    <x-home.about />

    {{-- Products Section with Category Filter --}}
    <x-home.products :products="$products" :categories="$categories" />

    {{-- Brands Section --}}
    <x-home.brands :brands="$brands" />

    {{-- Contact Section --}}
    <x-home.contact />
</x-layout.app>
