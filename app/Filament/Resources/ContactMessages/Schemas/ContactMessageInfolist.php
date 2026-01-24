<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactMessageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('Contact Information'))
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('email')
                            ->label('Email address'),
                        TextEntry::make('phone')
                            ->placeholder('-'),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),

                Section::make(__('Message Details'))
                    ->schema([
                        TextEntry::make('type')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'product_inquiry' => 'success',
                                default => 'gray',
                            })
                            ->formatStateUsing(fn (string $state): string => match ($state) {
                                'product_inquiry' => __('Product Inquiry'),
                                default => __('General'),
                            }),
                        TextEntry::make('product.name')
                            ->label(__('Product'))
                            ->placeholder('-')
                            ->url(fn ($record) => $record->product_id
                                ? route('filament.admin.resources.products.edit', $record->product_id)
                                : null
                            )
                            ->openUrlInNewTab(),
                        TextEntry::make('subject')
                            ->placeholder('-'),
                        TextEntry::make('message')
                            ->columnSpanFull(),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),

                Section::make(__('Status'))
                    ->schema([
                        IconEntry::make('is_read')
                            ->boolean()
                            ->label(__('Read')),
                        TextEntry::make('created_at')
                            ->label(__('Received at'))
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->dateTime(),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
