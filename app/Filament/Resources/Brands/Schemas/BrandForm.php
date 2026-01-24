<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->rows(3)
                    ->maxLength(500),

                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('brands')
                    ->visibility('public')
                    ->imageEditor()
                    ->imageResizeMode('contain')
                    ->imageResizeTargetWidth('400')
                    ->imageResizeTargetHeight('400')
                    ->maxSize(2048),

                Toggle::make('active')
                    ->label('Active')
                    ->default(true),
            ]);
    }
}
