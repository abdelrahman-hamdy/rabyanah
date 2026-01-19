<?php

namespace App\Filament\Resources\HeroSlides\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HeroSlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Hero Slide')
                    ->tabs([
                        Tab::make('English')
                            ->schema([
                                TextInput::make('title')
                                    ->required(),
                                TextInput::make('subtitle'),
                                TextInput::make('button_text'),
                            ]),
                        Tab::make('Arabic')
                            ->schema([
                                TextInput::make('title_ar')
                                    ->label('Title (Arabic)'),
                                TextInput::make('subtitle_ar')
                                    ->label('Subtitle (Arabic)'),
                                TextInput::make('button_text_ar')
                                    ->label('Button Text (Arabic)'),
                            ]),
                    ])
                    ->columnSpanFull(),

                Section::make('Image & Link')
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->required()
                            ->directory('hero-slides')
                            ->imageEditor()
                            ->maxSize(5120)
                            ->columnSpanFull(),
                        TextInput::make('button_url')
                            ->label('Button URL')
                            ->url()
                            ->placeholder('https://'),
                    ]),

                Section::make('Settings')
                    ->schema([
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}
