<?php

namespace App\Filament\Resources\Categories\Tables;

use App\Models\Category;
use App\Services\ImageCompressionService;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

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
                IconColumn::make('is_active')
                    ->boolean()
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
                    ->action(function (Category $record): void {
                        $record->update(['is_active' => ! $record->is_active]);

                        Notification::make()
                            ->success()
                            ->title($record->is_active ? 'Category Activated' : 'Category Deactivated')
                            ->body("Category \"{$record->name}\" has been ".($record->is_active ? 'activated' : 'deactivated').'.')
                            ->send();
                    }),
                Action::make('compressImage')
                    ->label('Compress Image')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Compress Category Image')
                    ->modalDescription('This will losslessly compress the image for this category. No quality will be lost.')
                    ->modalSubmitActionLabel('Compress')
                    ->action(function (Category $record): void {
                        $service = app(ImageCompressionService::class);
                        $result = $service->optimizeCategory($record);

                        if ($result['images_processed'] === 0) {
                            Notification::make()
                                ->warning()
                                ->title('No Image Found')
                                ->body('This category has no image to compress.')
                                ->send();

                            return;
                        }

                        Notification::make()
                            ->success()
                            ->title('Image Compressed')
                            ->body(sprintf(
                                'Saved %s (%.1f%%)',
                                ImageCompressionService::formatBytes($result['saved_bytes']),
                                $result['saved_percentage']
                            ))
                            ->send();
                    }),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('compressImages')
                        ->label('Compress Images')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->color('success')
                        ->requiresConfirmation()
                        ->modalHeading('Compress Selected Categories Images')
                        ->modalDescription('This will losslessly compress all images for the selected categories. No quality will be lost.')
                        ->modalSubmitActionLabel('Compress All')
                        ->action(function (Collection $records): void {
                            $service = app(ImageCompressionService::class);
                            $result = $service->optimizeCategories($records);

                            if ($result['images_processed'] === 0) {
                                Notification::make()
                                    ->warning()
                                    ->title('No Images Found')
                                    ->body('The selected categories have no images to compress.')
                                    ->send();

                                return;
                            }

                            Notification::make()
                                ->success()
                                ->title('Images Compressed')
                                ->body(sprintf(
                                    'Compressed %d image(s) from %d category(ies). Saved %s (%.1f%%)',
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
            ->defaultSort('sort_order')
            ->reorderable('sort_order');
    }
}
