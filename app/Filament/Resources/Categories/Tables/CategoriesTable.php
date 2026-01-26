<?php

namespace App\Filament\Resources\Categories\Tables;

use App\Models\Category;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->disk('public')
                    ->circular()
                    ->defaultImageUrl(fn () => 'https://ui-avatars.com/api/?name=C&color=FFFFFF&background=2563eb'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('products_count')
                    ->counts('products')
                    ->label('Products')
                    ->sortable(),
                ToggleColumn::make('is_active')
                    ->label('Active'),
                TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Active'),
            ])
            ->recordActions([
                Action::make('toggleActive')
                    ->label(fn (Category $record): string => $record->is_active ? 'Deactivate' : 'Activate')
                    ->icon(fn (Category $record): string => $record->is_active ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->color(fn (Category $record): string => $record->is_active ? 'danger' : 'success')
                    ->requiresConfirmation()
                    ->action(function (Category $record): void {
                        $record->update(['is_active' => ! $record->is_active]);
                    }),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order');
    }
}
