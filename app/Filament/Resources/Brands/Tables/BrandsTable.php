<?php

namespace App\Filament\Resources\Brands\Tables;

use App\Models\Brand;
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

class BrandsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->disk('public')
                    ->circular()
                    ->defaultImageUrl(fn () => 'https://ui-avatars.com/api/?name=B&color=FFFFFF&background=2563eb'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->limit(50)
                    ->toggleable(),
                IconColumn::make('active')
                    ->boolean()
                    ->label('Active'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('active')
                    ->label('Active'),
            ])
            ->recordActions([
                Action::make('toggleActive')
                    ->label(fn ($record) => $record->active ? 'Deactivate' : 'Activate')
                    ->icon(fn ($record) => $record->active ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->color(fn ($record) => $record->active ? 'danger' : 'success')
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update(['active' => ! $record->active])),
                Action::make('compressImage')
                    ->label('Compress Image')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Compress Brand Image')
                    ->modalDescription('This will losslessly compress the image for this brand. No quality will be lost.')
                    ->modalSubmitActionLabel('Compress')
                    ->action(function (Brand $record): void {
                        $service = app(ImageCompressionService::class);
                        $result = $service->optimizeBrand($record);

                        if ($result['images_processed'] === 0) {
                            Notification::make()
                                ->warning()
                                ->title('No Image Found')
                                ->body('This brand has no image to compress.')
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
                        ->modalHeading('Compress Selected Brands Images')
                        ->modalDescription('This will losslessly compress all images for the selected brands. No quality will be lost.')
                        ->modalSubmitActionLabel('Compress All')
                        ->action(function (Collection $records): void {
                            $service = app(ImageCompressionService::class);
                            $result = $service->optimizeBrands($records);

                            if ($result['images_processed'] === 0) {
                                Notification::make()
                                    ->warning()
                                    ->title('No Images Found')
                                    ->body('The selected brands have no images to compress.')
                                    ->send();

                                return;
                            }

                            Notification::make()
                                ->success()
                                ->title('Images Compressed')
                                ->body(sprintf(
                                    'Compressed %d image(s) from %d brand(s). Saved %s (%.1f%%)',
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
            ->defaultSort('name');
    }
}
