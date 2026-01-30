<?php

namespace App\Filament\Widgets;

use App\Services\CacheService;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;

class ClearCacheWidget extends Widget
{
    protected static string $view = 'filament.widgets.clear-cache-widget';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = -1;

    public function clearAllCache(): void
    {
        CacheService::clearAllCache();

        Notification::make()
            ->success()
            ->title('Cache Cleared!')
            ->body('All caches have been cleared and rebuilt successfully.')
            ->send();
    }

    public function clearContentCache(): void
    {
        CacheService::clearContentCache();

        Notification::make()
            ->success()
            ->title('Content Cache Cleared!')
            ->body('Product, category, and content caches have been cleared.')
            ->send();
    }
}
