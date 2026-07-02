<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BorrowedBookResource\Pages;
use App\Models\BorrowedBook;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BorrowedBookResource extends Resource
{
    protected static ?string $model = BorrowedBook::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';

    protected static ?string $navigationGroup = 'Library Management';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('student', 'name', fn($query) => $query->where('role', 'student'))
                    ->required()
                    ->searchable()
                    ->preload()
                    ->label('Student'),
                Forms\Components\Select::make('book_id')
                    ->relationship('book', 'title')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->label('Book'),
                Forms\Components\DateTimePicker::make('borrowed_at')
                    ->default(now()),
                Forms\Components\DateTimePicker::make('return_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')
                    ->label('Student')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('book.title')
                    ->label('Book')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('borrowed_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('return_at')
                    ->dateTime()
                    ->sortable()
                    ->placeholder('Not returned'),
            ])
            ->filters([
                Tables\Filters\Filter::make('returned')
                    ->query(fn($query) => $query->whereNotNull('return_at')),
                Tables\Filters\Filter::make('not_returned')
                    ->query(fn($query) => $query->whereNull('return_at')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('mark_returned')
                    ->label('Return')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->visible(fn(BorrowedBook $record) => is_null($record->return_at))
                    ->action(fn(BorrowedBook $record) => $record->update(['return_at' => now()])),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBorrowedBooks::route('/'),
            'create' => Pages\CreateBorrowedBook::route('/create'),
            'edit' => Pages\EditBorrowedBook::route('/{record}/edit'),
        ];
    }
}
