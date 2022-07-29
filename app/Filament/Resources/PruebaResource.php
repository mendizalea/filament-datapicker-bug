<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PruebaResource\Pages;
use App\Filament\Resources\PruebaResource\RelationManagers;
use App\Models\Prueba;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TimePicker;

class PruebaResource extends Resource
{
    protected static ?string $model = Prueba::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
				Section::make('General')
					->schema([
						Forms\Components\Grid::make()
							->schema([
								TextInput::make('name')
									->rule('required'),
							])
					])->columnSpan([
						'sm' => 2,
					]),
                Section::make('Prueba')
					->schema([
						Forms\Components\Grid::make()
							->schema([
								Repeater::make('times')
									->relationship()
									->schema([
										TimePicker::make('time')
											->withoutSeconds()
											->rule('required')
											->reactive()
											->columnSpan([
												'md' => 3,
											]),
									])
									->dehydrated()
									->defaultItems(0)
									->disableLabel()
									->columns([
										'md' => 9,
									])
									->columnSpan([
										'md' => 2,
									]),
							])
					])->columnSpan([
						'sm' => 2,
					]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPruebas::route('/'),
            'create' => Pages\CreatePrueba::route('/create'),
            'edit' => Pages\EditPrueba::route('/{record}/edit'),
        ];
    }    
}
