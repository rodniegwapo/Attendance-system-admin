<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Models\Student;
use App\Models\YearLevel;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions\Action;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name')->required(),
                TextInput::make('middle_name')->nullable(),
                TextInput::make('last_name')->required(),
                TextInput::make('suffix')->nullable(),
                Select::make('year_level')
                    ->label('Year Level')
                    ->options(YearLevel::all()->pluck('name', 'id'))
                    ->searchable(),
            ]);
    }

    //     protected function getActions(): array
    //     {
    //     return [
    //         Action::make('students')->action('openSettingsModal'),
    //     ];
    // }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('last_name'),
                TextColumn::make('first_name'),
                TextColumn::make('middle_name'),
                BadgeColumn::make('yearLevel.name'),
                // TextColumn::make('year_level')->getStateUsing(function (Model $record) {
                //     return YearLevel::firstWhere('id', $record->year_level)->name;
                // }),

            ])
            ->defaultSort('last_name')
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
