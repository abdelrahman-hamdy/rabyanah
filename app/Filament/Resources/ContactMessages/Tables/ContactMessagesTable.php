<?php

namespace App\Filament\Resources\ContactMessages\Tables;

use App\Models\ContactMessage;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class ContactMessagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('is_read')
                    ->boolean()
                    ->label('Read')
                    ->trueIcon('heroicon-o-envelope-open')
                    ->falseIcon('heroicon-o-envelope')
                    ->trueColor('gray')
                    ->falseColor('primary'),
                TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'product_inquiry' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'product_inquiry' => __('Product Inquiry'),
                        default => __('General'),
                    }),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('product.name')
                    ->label('Product')
                    ->placeholder('-')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('subject')
                    ->searchable()
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_read')
                    ->label('Read Status')
                    ->trueLabel('Read')
                    ->falseLabel('Unread'),
                \Filament\Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'general' => __('General'),
                        'product_inquiry' => __('Product Inquiry'),
                    ]),
            ])
            ->recordActions([
                Action::make('toggleRead')
                    ->label(fn (ContactMessage $record): string => $record->is_read ? __('Mark as Unread') : __('Mark as Read'))
                    ->icon(fn (ContactMessage $record): string => $record->is_read ? 'heroicon-o-envelope' : 'heroicon-o-envelope-open')
                    ->color(fn (ContactMessage $record): string => $record->is_read ? 'gray' : 'success')
                    ->action(function (ContactMessage $record): void {
                        $record->update(['is_read' => ! $record->is_read]);

                        Notification::make()
                            ->title($record->is_read ? __('Marked as read') : __('Marked as unread'))
                            ->success()
                            ->send();
                    }),
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('markAsRead')
                        ->label(__('Mark as Read'))
                        ->icon('heroicon-o-envelope-open')
                        ->action(function (Collection $records): void {
                            $records->each->update(['is_read' => true]);

                            Notification::make()
                                ->title(__('Messages marked as read'))
                                ->success()
                                ->send();
                        })
                        ->deselectRecordsAfterCompletion(),
                    BulkAction::make('markAsUnread')
                        ->label(__('Mark as Unread'))
                        ->icon('heroicon-o-envelope')
                        ->action(function (Collection $records): void {
                            $records->each->update(['is_read' => false]);

                            Notification::make()
                                ->title(__('Messages marked as unread'))
                                ->success()
                                ->send();
                        })
                        ->deselectRecordsAfterCompletion(),
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
