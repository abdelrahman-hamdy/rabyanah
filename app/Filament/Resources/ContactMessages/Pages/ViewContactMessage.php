<?php

namespace App\Filament\Resources\ContactMessages\Pages;

use App\Filament\Resources\ContactMessages\ContactMessageResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewContactMessage extends ViewRecord
{
    protected static string $resource = ContactMessageResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Mark as read when viewed
        if (! $this->record->is_read) {
            $this->record->markAsRead();
        }

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('toggleRead')
                ->label(fn () => $this->record->is_read ? 'Mark as Unread' : 'Mark as Read')
                ->icon(fn () => $this->record->is_read ? 'heroicon-o-envelope' : 'heroicon-o-envelope-open')
                ->action(function () {
                    $this->record->update(['is_read' => ! $this->record->is_read]);
                    $this->refreshFormData(['is_read']);
                }),
            EditAction::make(),
        ];
    }
}
