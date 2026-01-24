<?php

namespace App\Filament\Resources\Products\Pages;

use App\Filament\Resources\Products\ProductResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view')
                ->label(__('View'))
                ->icon('heroicon-o-eye')
                ->url(fn () => route('products.show', $this->record->slug))
                ->openUrlInNewTab(),
            DeleteAction::make(),
        ];
    }

    protected function getFormActions(): array
    {
        return [
            ...parent::getFormActions(),
            Action::make('saveAndCreateNew')
                ->label(__('Save & Create New'))
                ->color('gray')
                ->action(function () {
                    $this->save();
                    $this->redirect(ProductResource::getUrl('create'));
                }),
        ];
    }
}
