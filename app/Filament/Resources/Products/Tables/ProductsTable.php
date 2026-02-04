<?php

namespace App\Filament\Resources\Products\Tables;

use App\Models\Product;
use App\Services\ImageCompressionService;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
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
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gallery')
                    ->label('Image')
                    ->disk('public')
                    ->circular()
                    ->getStateUsing(fn ($record) => $record->gallery[0] ?? null)
                    ->defaultImageUrl(fn () => 'https://ui-avatars.com/api/?name=P&color=FFFFFF&background=2563eb'),
                TextColumn::make('image_size')
                    ->label('Image Size')
                    ->getStateUsing(function (Product $record): string {
                        if (empty($record->gallery)) {
                            return '-';
                        }

                        $totalSize = 0;
                        foreach ($record->gallery as $image) {
                            if (Storage::disk('public')->exists($image)) {
                                $totalSize += Storage::disk('public')->size($image);
                            }
                        }

                        return ImageCompressionService::formatBytes($totalSize);
                    })
                    ->badge()
                    ->color(function (Product $record): string {
                        if (empty($record->gallery)) {
                            return 'gray';
                        }

                        $totalSize = 0;
                        foreach ($record->gallery as $image) {
                            if (Storage::disk('public')->exists($image)) {
                                $totalSize += Storage::disk('public')->size($image);
                            }
                        }

                        // Color based on size: green < 500KB, yellow < 1MB, red >= 1MB
                        if ($totalSize < 500 * 1024) {
                            return 'success';
                        } elseif ($totalSize < 1024 * 1024) {
                            return 'warning';
                        }

                        return 'danger';
                    })
                    ->sortable(query: function ($query, string $direction) {
                        // Note: Sorting by computed size is complex, skip for now
                        return $query;
                    }),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable()
                    ->badge()
                    ->color('primary'),
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
                TernaryFilter::make('is_featured')
                    ->label('Featured'),
                TernaryFilter::make('is_active')
                    ->label('Active'),
            ])
            ->recordActions([
                Action::make('toggleFeatured')
                    ->label(fn (Product $record): string => $record->is_featured ? 'Remove from Featured' : 'Add to Featured')
                    ->icon(fn (Product $record): string => $record->is_featured ? 'heroicon-s-star' : 'heroicon-o-star')
                    ->color(fn (Product $record): string => $record->is_featured ? 'warning' : 'gray')
                    ->action(function (Product $record): void {
                        $record->update(['is_featured' => ! $record->is_featured]);

                        Notification::make()
                            ->success()
                            ->title($record->is_featured ? 'Added to Featured' : 'Removed from Featured')
                            ->body("Product \"{$record->name}\" has been ".($record->is_featured ? 'added to' : 'removed from').' featured products.')
                            ->send();
                    }),
                Action::make('compressImages')
                    ->label('Compress Images')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Compress Product Images')
                    ->modalDescription('This will losslessly compress all gallery images for this product. No quality will be lost.')
                    ->modalSubmitActionLabel('Compress')
                    ->action(function (Product $record): void {
                        $service = app(ImageCompressionService::class);
                        $result = $service->optimizeProduct($record);

                        if ($result['images_processed'] === 0) {
                            Notification::make()
                                ->warning()
                                ->title('No Images Found')
                                ->body('This product has no images to compress.')
                                ->send();

                            return;
                        }

                        Notification::make()
                            ->success()
                            ->title('Images Compressed')
                            ->body(sprintf(
                                'Compressed %d image(s). Saved %s (%.1f%%)',
                                $result['images_processed'],
                                ImageCompressionService::formatBytes($result['saved_bytes']),
                                $result['saved_percentage']
                            ))
                            ->send();
                    }),
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
                    BulkAction::make('compressImages')
                        ->label('Compress Images')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->color('success')
                        ->requiresConfirmation()
                        ->modalHeading('Compress Selected Products Images')
                        ->modalDescription('This will losslessly compress all images for the selected products. No quality will be lost.')
                        ->modalSubmitActionLabel('Compress All')
                        ->action(function (Collection $records): void {
                            $service = app(ImageCompressionService::class);
                            $result = $service->optimizeProducts($records);

                            if ($result['images_processed'] === 0) {
                                Notification::make()
                                    ->warning()
                                    ->title('No Images Found')
                                    ->body('The selected products have no images to compress.')
                                    ->send();

                                return;
                            }

                            Notification::make()
                                ->success()
                                ->title('Images Compressed')
                                ->body(sprintf(
                                    'Compressed %d image(s) from %d product(s). Saved %s (%.1f%%)',
                                    $result['images_processed'],
                                    $records->count(),
                                    ImageCompressionService::formatBytes($result['saved_bytes']),
                                    $result['saved_percentage']
                                ))
                                ->send();
                        })
                        ->deselectRecordsAfterCompletion(),
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
