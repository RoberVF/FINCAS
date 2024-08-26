<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProduccionResource\Pages;
use App\Filament\Resources\ProduccionResource\RelationManagers;
use App\Models\Produccion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;

use App\Models\Finca;

class ProduccionResource extends Resource
{
    protected static ?string $model = Produccion::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Produccion';
    protected static ?string $navigationGroup = 'Operaciones';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('finca_id')
                    ->relationship(name: 'finca', titleAttribute: 'nombre')
                    ->label("Finca")
                    ->required(),
                Forms\Components\DatePicker::make('fecha')
                    ->required(),
                Forms\Components\TextInput::make('cantidad')
                    ->required(),
                Forms\Components\TextInput::make('descripcion'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('finca.nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cantidad')
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('finca_id')
                    ->label("Finca")
                    ->options(
                        Finca::all()
                            ->pluck('nombre', 'id')
                            ->toArray()
                    )
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
            'index' => Pages\ListProduccions::route('/'),
            'create' => Pages\CreateProduccion::route('/create'),
            'edit' => Pages\EditProduccion::route('/{record}/edit'),
        ];
    }
}
