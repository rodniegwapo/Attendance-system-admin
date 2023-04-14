<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimeInOutResource\Pages;
use App\Models\TimeInOut;
use App\Models\YearLevel;
use Carbon\Carbon;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class TimeInOutResource extends Resource
{
    protected static ?string $model = TimeInOut::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Attendances';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.first_name')->label('First Name')->searchable(),
                TextColumn::make('student.middle_name')->label('Middle Name')->searchable(),
                TextColumn::make('student.last_name')->label('Last Name')->searchable(),

                TextColumn::make('student.yearLevel.name')->label('Year Level'),
                BadgeColumn::make('event.name')->label('Event'),
                TextColumn::make('time_in')->getStateUsing(function (Model $record) {
                        return Carbon::parse($record->time_in)->format('F d, Y h:m:s A');
                    }),
                TextColumn::make('time_out')->getStateUsing(function (Model $record) {
                    return Carbon::parse($record->time_out)->format('F d, Y h:m:s A');
                }),
            ])
            ->filters([
                //
                SelectFilter::make('event')->relationship('event', 'name')->searchable(),
                SelectFilter::make('student')->options(fn () => YearLevel::all()->pluck('name', 'id')->toArray())
                ->query(function (Builder $query, array $data) {
                    if (! empty($data['value'])) {
                        return $query->whereHas('student', fn ($query) => $query->where('year_level_id', $data['value']));
                    }
                }),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ])->poll('5s');
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
            'index' => Pages\ListTimeInOuts::route('/'),
            'create' => Pages\CreateTimeInOut::route('/create'),
            'edit' => Pages\EditTimeInOut::route('/{record}/edit'),
        ];
    }
}