@php
    $seoService = app(\App\Services\SeoService::class);
    $meta = $seoService->getDefaultMeta();
    $webPageSchema = $seoService->getWebPageSchema(
        $meta['title'],
        $meta['description'],
        route('home')
    );
@endphp

<x-layout.app
    :title="$meta['title']"
    :description="$meta['description']"
    :schemas="[$webPageSchema]"
>
    {{-- Hero Section --}}
    <x-home.hero />

    {{-- Featured Products Section --}}
    <x-home.featured-products :products="$featuredProducts" />

    {{-- Products Section with Category Filter --}}
    <x-home.products :products="$products" :categories="$categories" />

    {{-- Categories Section --}}
    <x-home.categories :categories="$categories" />

    {{-- Brands Section --}}
    <x-home.brands :brands="$brands" />

    {{-- Contact Section --}}
    <x-home.contact />
</x-layout.app>
