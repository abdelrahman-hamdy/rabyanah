<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactMessage extends Model
{
    protected $fillable = [
        'product_id',
        'product_name',
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'is_read',
        'type',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    public function scopeRead($query)
    {
        return $query->where('is_read', true);
    }

    public function scopeGeneral($query)
    {
        return $query->where('type', 'general');
    }

    public function scopeProductInquiry($query)
    {
        return $query->where('type', 'product_inquiry');
    }

    public function markAsRead(): void
    {
        $this->update(['is_read' => true]);
    }

    public function isProductInquiry(): bool
    {
        return $this->type === 'product_inquiry';
    }
}
