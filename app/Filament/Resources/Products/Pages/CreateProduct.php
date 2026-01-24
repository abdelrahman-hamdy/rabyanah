<?php

namespace App\Filament\Resources\Products\Pages;

use App\Filament\Resources\Products\ProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function preserveFormDataWhenCreatingAnother(array $data): array
    {
        // Preserve category and brand when creating another product
        return [
            'category_id' => $data['category_id'] ?? null,
            'brand_id' => $data['brand_id'] ?? null,
            'is_active' => $data['is_active'] ?? true,
        ];
    }
}
