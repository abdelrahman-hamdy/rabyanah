<?php

namespace App\Filament\Resources\Brands\Pages;

use App\Filament\Resources\Brands\BrandResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBrand extends EditRecord
{
    protected static string $resource = BrandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('toggleActive')
                ->label(fn () => $this->record->active ? 'Deactivate' : 'Activate')
                ->icon(fn () => $this->record->active ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                ->color(fn () => $this->record->active ? 'danger' : 'success')
                ->requiresConfirmation()
                ->action(function () {
                    $this->record->update(['active' => ! $this->record->active]);
                    $this->refreshFormData(['active']);
                }),
            DeleteAction::make(),
        ];
    }
}
