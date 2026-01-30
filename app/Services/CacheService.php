<?php

namespace App\Services;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class CacheService
{
    // Cache TTLs (in seconds) - 7 days for static content
    public const TTL_WEEK = 604800;      // 7 days

    public const TTL_DAY = 86400;        // 1 day

    public const TTL_HOUR = 3600;        // 1 hour

    // Cache tags
    public const TAG_HOME = 'home';

    public const TAG_PRODUCTS = 'products';

    public const TAG_CATEGORIES = 'categories';

    public const TAG_BRANDS = 'brands';

    public const TAG_SEARCH = 'search';

    public const TAG_FEATURED = 'featured';

    /**
     * Get all cache tags
     */
    public static function allTags(): array
    {
        return [
            self::TAG_HOME,
            self::TAG_PRODUCTS,
            self::TAG_CATEGORIES,
            self::TAG_BRANDS,
            self::TAG_SEARCH,
            self::TAG_FEATURED,
        ];
    }

    /**
     * Clear content cache (products, categories, etc.)
     */
    public static function clearContentCache(): void
    {
        Cache::tags(self::allTags())->flush();
    }

    /**
     * Clear all caches and rebuild
     */
    public static function clearAllCache(): void
    {
        // Clear Redis cache
        Cache::flush();

        // Clear Laravel caches
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');

        // Rebuild caches for production
        Artisan::call('config:cache');
        Artisan::call('route:cache');
        Artisan::call('view:cache');
    }

    /**
     * Clear product-related caches
     */
    public static function clearProductCache(?int $productId = null): void
    {
        $tags = [self::TAG_PRODUCTS, self::TAG_HOME, self::TAG_FEATURED, self::TAG_SEARCH];

        if ($productId) {
            $tags[] = "product_{$productId}";
        }

        Cache::tags($tags)->flush();
    }

    /**
     * Clear category-related caches
     */
    public static function clearCategoryCache(?int $categoryId = null): void
    {
        $tags = [self::TAG_CATEGORIES, self::TAG_HOME, self::TAG_PRODUCTS];

        if ($categoryId) {
            $tags[] = "category_{$categoryId}";
        }

        Cache::tags($tags)->flush();
    }

    /**
     * Clear brand-related caches
     */
    public static function clearBrandCache(): void
    {
        Cache::tags([self::TAG_BRANDS, self::TAG_HOME])->flush();
    }

    /**
     * Generate cache key with locale
     */
    public static function key(string $prefix, ...$parts): string
    {
        $locale = app()->getLocale();
        $key = $prefix.'_'.implode('_', $parts).'_'.$locale;

        return $key;
    }

    /**
     * Remember with tags
     */
    public static function remember(array $tags, string $key, int $ttl, callable $callback): mixed
    {
        return Cache::tags($tags)->remember($key, $ttl, $callback);
    }
}
