<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers\YearLevelsRelationManager;
use App\Models\Event;
use App\Models\YearLevel;
use Carbon\Carbon;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Event Name')->required(),
                // Select::make('year_level')
                //     ->multiple()
                //     ->label('Year Level')
                //     ->options(YearLevel::all()->pluck('name', 'id'))
                //     ->searchable(),
                DateTimePicker::make('date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('date')->getStateUsing(function (Model $record) {
                    return Carbon::parse($record->date)->format('D, M d, Y h:m:s A');
                }),
                TagsColumn::make('yearLevels.name'),
                // TagsColumn::make('yearLevels')->getStateUsing(function (Model $record) {

                // //     $levels = YearLevel::whereIn('id', explode(',', $record->year_level))->get();

                // //     $newLevels = $levels->map(function ($item, $key) {
                // //         return $item['name'];
                // //     });

                // //    return $newLevels->toArray();
                // }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            YearLevelsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
