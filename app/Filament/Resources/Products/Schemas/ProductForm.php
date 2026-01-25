<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
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
                                Textarea::make('description')
                                    ->rows(4),
                            ]),
                        Tab::make('Arabic')
                            ->schema([
                                TextInput::make('name_ar')
                                    ->label('Name (Arabic)'),
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
                    ])
                    ->columns(2),

                Section::make('Images')
                    ->description('Drag to reorder. The first image will be used as the main product image.')
                    ->schema([
                        FileUpload::make('gallery')
                            ->label('Product Images')
                            ->image()
                            ->multiple()
                            ->disk('public')
                            ->directory('products')
                            ->visibility('public')
                            ->imageEditor()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('4:3')
                            ->imageResizeTargetWidth('800')
                            ->imageResizeTargetHeight('600')
                            ->maxSize(2048)
                            ->maxFiles(10)
                            ->reorderable()
                            ->panelLayout('grid')
                            ->columnSpanFull(),
                    ]),

                Section::make('Settings')
                    ->schema([
                        Toggle::make('is_featured')
                            ->label('Featured')
                            ->default(false),
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}
