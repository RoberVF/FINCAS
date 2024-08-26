<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TratamientoResource\Pages;
use App\Filament\Resources\TratamientoResource\RelationManagers;
use App\Models\Tratamiento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\Finca;

class TratamientoResource extends Resource
{
    protected static ?string $model = Tratamiento::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';
    protected static ?string $navigationGroup = 'Operaciones';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('finca_id')
                    ->relationship(name: 'finca', titleAttribute: 'nombre')
                    ->required(),
                Forms\Components\DatePicker::make('fecha')
                    ->required(),
                Forms\Components\TextInput::make('descripcion')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('finca.nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('descripcion')
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
                SelectFilter::make('finca_id')
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
            'index' => Pages\ListTratamientos::route('/'),
            'create' => Pages\CreateTratamiento::route('/create'),
            'edit' => Pages\EditTratamiento::route('/{record}/edit'),
        ];
    }
}
