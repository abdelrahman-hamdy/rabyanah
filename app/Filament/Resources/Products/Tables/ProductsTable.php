<?php

namespace App\Filament\Resources\Products\Tables;

use App\Models\Product;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gallery')
                    ->label('Image')
                    ->circular()
                    ->getStateUsing(fn ($record) => $record->gallery[0] ?? null)
                    ->defaultImageUrl(fn () => 'https://ui-avatars.com/api/?name=P&color=FFFFFF&background=2563eb'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable()
                    ->badge()
                    ->color('primary'),
                TextColumn::make('brand.name')
                    ->label('Brand')
                    ->sortable(),
                IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),
                IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->relationship('category', 'name')
                    ->preload(),
                SelectFilter::make('brand')
                    ->relationship('brand', 'name')
                    ->preload(),
                TernaryFilter::make('is_featured')
                    ->label('Featured'),
                TernaryFilter::make('is_active')
                    ->label('Active'),
            ])
            ->recordActions([
                EditAction::make(),
                ActionGroup::make([
                    ReplicateAction::make()
                        ->label('Duplicate')
                        ->beforeReplicaSaved(function (Product $replica, Product $record): void {
                            // Generate unique slug for the duplicate
                            $baseSlug = $record->slug.'-copy';
                            $slug = $baseSlug;
                            $counter = 1;

                            while (Product::where('slug', $slug)->exists()) {
                                $slug = $baseSlug.'-'.$counter;
                                $counter++;
                            }

                            $replica->slug = $slug;
                            $replica->name = $record->name.' (Copy)';

                            if ($record->name_ar) {
                                $replica->name_ar = $record->name_ar.' (نسخة)';
                            }

                            // Gallery array is copied by reference - same images, no file duplication
                        })
                        ->successNotification(
                            Notification::make()
                                ->success()
                                ->title('Product duplicated')
                                ->body('The product has been duplicated successfully. Images are shared with the original.')
                        ),
                    DeleteAction::make(),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
