<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Library Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('author')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('author_id')
                    ->relationship('authorUser', 'name', fn($query) => $query->where('role', 'author'))
                    ->searchable()
                    ->preload()
                    ->label('Internal Author (User)'),
                Forms\Components\FileUpload::make('cover_image')
                    ->image()
                    ->directory('book-covers')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('available_copies')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('isbn')
                    ->label('ISBN')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('published_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('author')
                    ->searchable(),
                Tables\Columns\TextColumn::make('authorUser.name')
                    ->label('Internal Author')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('available_copies')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color(fn($state): string => match (true) {
                        $state > 5 => 'success',
                        $state > 0 => 'warning',
                        default => 'danger',
                    }),
                Tables\Columns\TextColumn::make('published_at')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
