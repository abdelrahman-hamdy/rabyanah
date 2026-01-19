<?php

namespace App\Filament\Resources\ContactMessages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

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
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('subject')
                    ->searchable()
                    ->limit(40),
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
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
