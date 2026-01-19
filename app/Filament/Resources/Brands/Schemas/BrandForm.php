<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Brand')
                    ->tabs([
                        Tab::make('English')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                Textarea::make('description')
                                    ->rows(3),
                            ]),
                        Tab::make('Arabic')
                            ->schema([
                                TextInput::make('name_ar')
                                    ->label('Name (Arabic)'),
                                Textarea::make('description_ar')
                                    ->label('Description (Arabic)')
                                    ->rows(3),
                            ]),
                    ])
                    ->columnSpanFull(),

                Section::make('Details')
                    ->schema([
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        TextInput::make('website_url')
                            ->label('Website URL')
                            ->url()
                            ->placeholder('https://'),
                        FileUpload::make('logo')
                            ->image()
                            ->directory('brands')
                            ->imageEditor()
                            ->maxSize(2048),
                    ])
                    ->columns(2),

                Section::make('Settings')
                    ->schema([
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                        Toggle::make('is_featured')
                            ->label('Featured')
                            ->default(false),
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])
                    ->columns(3),
            ]);
    }
}
