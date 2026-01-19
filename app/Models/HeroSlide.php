<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    protected $fillable = [
        'title',
        'title_ar',
        'subtitle',
        'subtitle_ar',
        'image',
        'button_text',
        'button_text_ar',
        'button_url',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function getLocalizedTitleAttribute(): string
    {
        return app()->getLocale() === 'ar' && $this->title_ar ? $this->title_ar : $this->title;
    }

    public function getLocalizedSubtitleAttribute(): ?string
    {
        return app()->getLocale() === 'ar' && $this->subtitle_ar ? $this->subtitle_ar : $this->subtitle;
    }

    public function getLocalizedButtonTextAttribute(): ?string
    {
        return app()->getLocale() === 'ar' && $this->button_text_ar ? $this->button_text_ar : $this->button_text;
    }
}
