<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use App\Models\SiteSetting;
use Illuminate\Support\Str;

class SeoService
{
    public function getDefaultMeta(): array
    {
        $locale = app()->getLocale();
        $siteName = SiteSetting::get('site_name', 'Rabyanah');

        return [
            'title' => $siteName.' - '.__('Global Food Trade Company'),
            'description' => $locale === 'ar'
                ? 'ربيانه - شركة تجارة أغذية عالمية تقدم منتجات غذائية عالية الجودة والعلامات التجارية المميزة من جميع أنحاء العالم.'
                : 'Rabyanah - A global food trade company offering premium quality food products and distinguished brands from around the world.',
            'keywords' => $locale === 'ar'
                ? 'تجارة أغذية، منتجات غذائية، علامات تجارية عالمية، استيراد وتصدير، منتجات فاخرة'
                : 'food trade, food products, global brands, import export, premium food, wholesale food',
            'image' => asset('images/og-default.jpg'),
            'type' => 'website',
        ];
    }

    public function getProductMeta(Product $product): array
    {
        $siteName = SiteSetting::get('site_name', 'Rabyanah');

        $description = $product->localized_description
            ? Str::limit(strip_tags($product->localized_description), 155)
            : __('Discover :product - Premium quality food products from Rabyanah, your trusted global food trade partner.', [
                'product' => $product->localized_name,
            ]);

        return [
            'title' => $product->localized_name.' - '.$siteName,
            'description' => $description,
            'image' => $product->image_url ?? asset('images/og-default.jpg'),
            'type' => 'product',
        ];
    }

    public function getCategoryMeta(Category $category): array
    {
        $siteName = SiteSetting::get('site_name', 'Rabyanah');

        $description = $category->localized_description
            ? Str::limit(strip_tags($category->localized_description), 155)
            : __('Browse our :category collection - Premium quality food products from Rabyanah.', [
                'category' => $category->localized_name,
            ]);

        return [
            'title' => $category->localized_name.' - '.$siteName,
            'description' => $description,
            'image' => $category->image_url ?? asset('images/og-default.jpg'),
            'type' => 'website',
        ];
    }

    public function getOrganizationSchema(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => SiteSetting::get('site_name', 'Rabyanah'),
            'url' => config('app.url'),
            'logo' => asset('images/logo.svg'),
            'description' => SiteSetting::get('site_description', 'Global food trade company offering premium quality food products'),
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => SiteSetting::get('contact_phone', ''),
                'email' => SiteSetting::get('contact_email', ''),
                'contactType' => 'customer service',
            ],
            'sameAs' => array_values(array_filter([
                SiteSetting::get('social_facebook'),
                SiteSetting::get('social_twitter'),
                SiteSetting::get('social_instagram'),
                SiteSetting::get('social_linkedin'),
            ])),
        ];
    }

    public function getProductSchema(Product $product): array
    {
        $images = $product->gallery_urls ?? [];
        if ($product->image_url) {
            array_unshift($images, $product->image_url);
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $product->localized_name,
            'description' => $product->localized_description ? strip_tags($product->localized_description) : null,
            'image' => $images ?: [asset('images/og-default.jpg')],
            'category' => $product->category?->localized_name,
            'brand' => [
                '@type' => 'Brand',
                'name' => 'Rabyanah',
            ],
            'offers' => [
                '@type' => 'Offer',
                'availability' => 'https://schema.org/InStock',
                'url' => route('products.show', $product->slug),
            ],
        ];
    }

    public function getBreadcrumbSchema(array $items): array
    {
        $listItems = [];
        foreach ($items as $index => $item) {
            $listItem = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['name'],
            ];

            if (isset($item['url']) && $item['url']) {
                $listItem['item'] = $item['url'];
            }

            $listItems[] = $listItem;
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $listItems,
        ];
    }

    public function getWebPageSchema(string $name, string $description, ?string $url = null): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => $name,
            'description' => $description,
            'url' => $url ?? url()->current(),
            'isPartOf' => [
                '@type' => 'WebSite',
                'name' => SiteSetting::get('site_name', 'Rabyanah'),
                'url' => config('app.url'),
            ],
        ];
    }
}
