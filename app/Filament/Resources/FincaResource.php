<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FincaResource\Pages;
use App\Filament\Resources\FincaResource\RelationManagers;
use App\Models\Finca;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FincaResource extends Resource
{
    protected static ?string $model = Finca::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required(),
                Forms\Components\TextInput::make('dimensiones')
                    ->label("Dimensiones (metros)"),
                Forms\Components\TextInput::make('num_parras')
                    ->label("Numero de plantas"),
                Forms\Components\TextInput::make('terreno'),
                Forms\Components\TextInput::make('ubicacion')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('dimensiones'),
                Tables\Columns\TextColumn::make('num_parras')
                    ->label("Numero de plantas")
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('terreno')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ubicacion')
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
            'index' => Pages\ListFincas::route('/'),
            'create' => Pages\CreateFinca::route('/create'),
            'edit' => Pages\EditFinca::route('/{record}/edit'),
        ];
    }
}
