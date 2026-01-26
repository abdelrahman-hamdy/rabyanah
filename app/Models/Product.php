<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name',
        'name_ar',
        'slug',
        'description',
        'description_ar',
        'gallery',
        'category_id',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->whereHas('category', fn ($q) => $q->where('is_active', true));
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeInCategory($query, $categorySlug)
    {
        return $query->whereHas('category', function ($q) use ($categorySlug) {
            $q->where('slug', $categorySlug);
        });
    }

    /**
     * Get the main image URL (first image from gallery)
     */
    public function getImageUrlAttribute(): ?string
    {
        if (! $this->gallery || empty($this->gallery)) {
            return null;
        }

        $firstImage = is_array($this->gallery) ? ($this->gallery[0] ?? null) : null;

        return $firstImage ? Storage::disk('public')->url($firstImage) : null;
    }

    /**
     * Get all gallery image URLs
     */
    public function getGalleryUrlsAttribute(): array
    {
        if (! $this->gallery || empty($this->gallery)) {
            return [];
        }

        return array_map(function ($image) {
            return Storage::disk('public')->url($image);
        }, $this->gallery);
    }

    /**
     * Get gallery images excluding the first one (for product detail page)
     */
    public function getAdditionalImagesAttribute(): array
    {
        if (! $this->gallery || count($this->gallery) <= 1) {
            return [];
        }

        return array_map(function ($image) {
            return Storage::disk('public')->url($image);
        }, array_slice($this->gallery, 1));
    }

    public function getLocalizedNameAttribute(): string
    {
        return app()->getLocale() === 'ar' && $this->name_ar ? $this->name_ar : $this->name;
    }

    public function getLocalizedDescriptionAttribute(): ?string
    {
        return app()->getLocale() === 'ar' && $this->description_ar ? $this->description_ar : $this->description;
    }
}
