<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Personal Information')
                    ->schema([
                        TextInput::make('name')->autofocus()->required(),
                        TextInput::make('email')->email()->required(),
                        Select::make('type')->options([
                            'regular' => 'Regular',
                            'visiting' => 'Visiting',
                        ])->placeholder('Select Type Plz')
                            ->required(),
                        DatePicker::make('birthday'),
                        TagsInput::make('test')->separator(','),

                        Toggle::make('asd')
                            ->autofocus() // Autofocus the field.
                            ->inline() // Render the toggle inline with its label.

                        ,

                        TextInput::make('manufacturer')
                            ->datalist([
                                'BWM',
                                'Ford',
                                'Mercedes-Benz',
                                'Porsche',
                                'Toyota',
                                'Tesla',
                                'Volkswagen',
                            ]),
                        Radio::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'scheduled' => 'Scheduled',
                                'published' => 'Published'
                            ]),

                            CheckboxList::make('tags')
                            ->options([
                                'laravel' => 'Laravel',
                                'php' => 'PHP',
                                'javascript' => 'JavaScript',
                                'vue' => 'Vue',
                                'react' => 'React',
                                'tailwind' => 'Tailwind',
                            ])


                    ])->collapsible()->columns(2)





            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('type')->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageEmployees::route('/'),
        ];
    }
}
