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
                    ->maxLength(255)
                    ->required(),
                Forms\Components\TextInput::make('dimensiones')
                    ->numeric()
                    ->label("Dimensiones (metros)"),
                Forms\Components\TextInput::make('num_parras')
                    ->numeric()
                    ->minValue(0)
                    ->label("Numero de parras"),
                Forms\Components\TextInput::make('terreno'),
                Forms\Components\TextInput::make('ubicacion')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dimensiones')
                    ->label("Dimensiones (m²)")
                    ->sortable()
                    ->numeric()
                    ->suffix(" m²"),
                Tables\Columns\TextColumn::make('num_parras')
                    ->label("Numero de parras")
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('terreno')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ubicacion')
                    ->searchable()
                    ->limit(30),

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
                Tables\Filters\SelectFilter::make('ubicacion')
                    ->options(Finca::all()->pluck('ubicacion', 'ubicacion'))
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
