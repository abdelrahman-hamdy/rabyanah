<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Cache Management</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Clear website cache when content is updated</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <x-filament::button
                    wire:click="clearContentCache"
                    color="warning"
                    icon="heroicon-o-document-text"
                >
                    Clear Content Cache
                </x-filament::button>
                <x-filament::button
                    wire:click="clearAllCache"
                    color="danger"
                    icon="heroicon-o-trash"
                >
                    Clear All Cache
                </x-filament::button>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
