<?php

namespace App\Services;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class ImageCompressionService
{
    protected $optimizer;

    public function __construct()
    {
        $this->optimizer = OptimizerChainFactory::create();
    }

    /**
     * Optimize a single image file and return compression stats.
     */
    public function optimizeImage(string $relativePath): array
    {
        $disk = Storage::disk('public');

        if (! $disk->exists($relativePath)) {
            return [
                'success' => false,
                'error' => 'File not found',
                'path' => $relativePath,
            ];
        }

        $absolutePath = $disk->path($relativePath);
        $originalSize = filesize($absolutePath);

        try {
            $this->optimizer->optimize($absolutePath);
            clearstatcache(true, $absolutePath);
            $compressedSize = filesize($absolutePath);

            $savedBytes = $originalSize - $compressedSize;
            $savedPercentage = $originalSize > 0
                ? round(($savedBytes / $originalSize) * 100, 2)
                : 0;

            return [
                'success' => true,
                'path' => $relativePath,
                'original_size' => $originalSize,
                'compressed_size' => $compressedSize,
                'saved_bytes' => $savedBytes,
                'saved_percentage' => $savedPercentage,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'path' => $relativePath,
            ];
        }
    }

    /**
     * Optimize all images in a Product's gallery.
     */
    public function optimizeProduct(Product $product): array
    {
        $gallery = $product->gallery ?? [];

        if (empty($gallery)) {
            return $this->emptyResult();
        }

        return $this->optimizeMultipleImages($gallery);
    }

    /**
     * Optimize multiple products (bulk action).
     *
     * @param  \Illuminate\Support\Collection  $products
     */
    public function optimizeProducts($products): array
    {
        $totalStats = $this->emptyResult();

        foreach ($products as $product) {
            $result = $this->optimizeProduct($product);
            $totalStats = $this->mergeStats($totalStats, $result);
        }

        return $totalStats;
    }

    /**
     * Optimize a Category's image.
     */
    public function optimizeCategory(Category $category): array
    {
        if (! $category->image) {
            return $this->emptyResult();
        }

        $result = $this->optimizeImage($category->image);

        return $this->singleToMultipleStats($result);
    }

    /**
     * Optimize multiple categories (bulk action).
     *
     * @param  \Illuminate\Support\Collection  $categories
     */
    public function optimizeCategories($categories): array
    {
        $totalStats = $this->emptyResult();

        foreach ($categories as $category) {
            $result = $this->optimizeCategory($category);
            $totalStats = $this->mergeStats($totalStats, $result);
        }

        return $totalStats;
    }

    /**
     * Optimize a Brand's image.
     */
    public function optimizeBrand(Brand $brand): array
    {
        if (! $brand->image) {
            return $this->emptyResult();
        }

        $result = $this->optimizeImage($brand->image);

        return $this->singleToMultipleStats($result);
    }

    /**
     * Optimize multiple brands (bulk action).
     *
     * @param  \Illuminate\Support\Collection  $brands
     */
    public function optimizeBrands($brands): array
    {
        $totalStats = $this->emptyResult();

        foreach ($brands as $brand) {
            $result = $this->optimizeBrand($brand);
            $totalStats = $this->mergeStats($totalStats, $result);
        }

        return $totalStats;
    }

    /**
     * Optimize multiple images and aggregate results.
     */
    protected function optimizeMultipleImages(array $paths): array
    {
        $totalOriginal = 0;
        $totalCompressed = 0;
        $imagesProcessed = 0;

        foreach ($paths as $path) {
            $result = $this->optimizeImage($path);

            if ($result['success']) {
                $totalOriginal += $result['original_size'];
                $totalCompressed += $result['compressed_size'];
                $imagesProcessed++;
            }
        }

        $savedBytes = $totalOriginal - $totalCompressed;
        $savedPercentage = $totalOriginal > 0
            ? round(($savedBytes / $totalOriginal) * 100, 2)
            : 0;

        return [
            'original_size' => $totalOriginal,
            'compressed_size' => $totalCompressed,
            'saved_bytes' => $savedBytes,
            'saved_percentage' => $savedPercentage,
            'images_processed' => $imagesProcessed,
        ];
    }

    /**
     * Convert single image result to multi-image stats format.
     */
    protected function singleToMultipleStats(array $result): array
    {
        if (! $result['success']) {
            return $this->emptyResult();
        }

        return [
            'original_size' => $result['original_size'],
            'compressed_size' => $result['compressed_size'],
            'saved_bytes' => $result['saved_bytes'],
            'saved_percentage' => $result['saved_percentage'],
            'images_processed' => 1,
        ];
    }

    /**
     * Merge two stats arrays together.
     */
    protected function mergeStats(array $stats1, array $stats2): array
    {
        $totalOriginal = $stats1['original_size'] + $stats2['original_size'];
        $totalCompressed = $stats1['compressed_size'] + $stats2['compressed_size'];
        $savedBytes = $totalOriginal - $totalCompressed;
        $savedPercentage = $totalOriginal > 0
            ? round(($savedBytes / $totalOriginal) * 100, 2)
            : 0;

        return [
            'original_size' => $totalOriginal,
            'compressed_size' => $totalCompressed,
            'saved_bytes' => $savedBytes,
            'saved_percentage' => $savedPercentage,
            'images_processed' => $stats1['images_processed'] + $stats2['images_processed'],
        ];
    }

    /**
     * Return empty result for items with no images.
     */
    protected function emptyResult(): array
    {
        return [
            'original_size' => 0,
            'compressed_size' => 0,
            'saved_bytes' => 0,
            'saved_percentage' => 0,
            'images_processed' => 0,
        ];
    }

    /**
     * Format bytes to human readable string.
     */
    public static function formatBytes(int $bytes, int $precision = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);

        return round($bytes, $precision).' '.$units[$pow];
    }
}
