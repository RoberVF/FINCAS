<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LluviaResource\Pages;
use App\Filament\Resources\LluviaResource\RelationManagers;
use App\Models\Lluvia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LluviaResource extends Resource
{
    protected static ?string $model = Lluvia::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Clima';
    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ubicacion')
                    ->required(),
                Forms\Components\DatePicker::make('fecha')
                    ->required(),
                Forms\Components\TextInput::make('cantidad')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ubicacion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha'),
                Tables\Columns\TextColumn::make('cantidad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListLluvias::route('/'),
            'create' => Pages\CreateLluvia::route('/create'),
            'edit' => Pages\EditLluvia::route('/{record}/edit'),
        ];
    }
}
