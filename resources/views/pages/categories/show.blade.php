@php
    $seoService = app(\App\Services\SeoService::class);
    $meta = $seoService->getCategoryMeta($category);
    $breadcrumbSchema = $seoService->getBreadcrumbSchema([
        ['name' => __('Home'), 'url' => route('home')],
        ['name' => __('Products'), 'url' => route('products.index')],
        ['name' => $category->localized_name],
    ]);
@endphp

<x-layout.app
    :title="$meta['title']"
    :description="$meta['description']"
    :image="$meta['image']"
    :schemas="[$breadcrumbSchema]"
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

    <!-- Products Section with Infinite Scroll -->
    <section class="pb-20 md:pb-28" style="background-color: #ffffff; padding-top: 80px;">
        <div class="container mx-auto px-4 lg:px-8">
            <livewire:product-grid :category-id="$category->id" :show-category="false" />
        </div>
    </section>
</x-layout.app>
