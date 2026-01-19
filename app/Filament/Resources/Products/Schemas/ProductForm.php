<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Brand;
use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Product')
                    ->tabs([
                        Tab::make('English')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                TextInput::make('short_description')
                                    ->label('Short Description')
                                    ->maxLength(255),
                                Textarea::make('description')
                                    ->rows(4),
                            ]),
                        Tab::make('Arabic')
                            ->schema([
                                TextInput::make('name_ar')
                                    ->label('Name (Arabic)'),
                                TextInput::make('short_description_ar')
                                    ->label('Short Description (Arabic)')
                                    ->maxLength(255),
                                Textarea::make('description_ar')
                                    ->label('Description (Arabic)')
                                    ->rows(4),
                            ]),
                    ])
                    ->columnSpanFull(),

                Section::make('Classification')
                    ->schema([
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Select::make('category_id')
                            ->label('Category')
                            ->options(Category::active()->ordered()->pluck('name', 'id'))
                            ->searchable()
                            ->preload(),
                        Select::make('brand_id')
                            ->label('Brand')
                            ->options(Brand::active()->ordered()->pluck('name', 'id'))
                            ->searchable()
                            ->preload(),
                    ])
                    ->columns(3),

                Section::make('Images')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Main Image')
                            ->image()
                            ->directory('products')
                            ->imageEditor()
                            ->maxSize(2048),
                        FileUpload::make('gallery')
                            ->label('Gallery Images')
                            ->image()
                            ->multiple()
                            ->directory('products/gallery')
                            ->imageEditor()
                            ->maxSize(2048)
                            ->maxFiles(10)
                            ->reorderable(),
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
