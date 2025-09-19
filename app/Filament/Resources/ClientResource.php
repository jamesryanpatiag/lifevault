<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\Client;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ClientResource\RelationManagers\DependenciesRelationManager;
use App\Filament\Resources\ClientResource\RelationManagers\PoliciesRelationManager;
use Filament\Forms\Components\FileUpload;
use App\Models\OccupationCategory;
use App\Models\NatureOfBusiness;
use Parfaitementweb\FilamentCountryField\Tables\Columns\CountryColumn;
use Parfaitementweb\FilamentCountryField\Forms\Components\Country;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Personal Information')
                ->schema([
                    FileUpload::make('avatar_url')
                            ->label('Photo')
                            ->directory('avatar')
                            ->avatar()
                            ->columnSpanFull(),
                    Forms\Components\TextInput::make('first_name')
                        ->rules(['required'])
                        ->maxLength(255),
                    Forms\Components\TextInput::make('middle_name')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('last_name')
                        ->rules(['required'])
                        ->maxLength(255),
                    Forms\Components\Select::make('title')
                        ->options([
                            'Mr.', 'Mrs.', 'Ms.', 'Miss', 'Sir', 'Madam', 'Dr.'
                        ]),
                    Forms\Components\DatePicker::make('birth_date')
                        ->rules(['required']),
                    Forms\Components\Radio::make('gender')
                        ->options([
                            'Male' => 'Male',
                            'Female' => 'Female',
                        ])
                        ->rules(['required']),
                    Forms\Components\TextInput::make('phone_number')
                        ->tel()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->rules(['required'])
                        ->maxLength(255),
                ])->columns(3),
                Forms\Components\Section::make('Address Information')
                ->schema([
                    Forms\Components\Textarea::make('address_1')
                        ->rules(['required'])
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('address_2')
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('city')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('province')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('postal')
                        ->maxLength(255),
                    Country::make('country')
                        ->searchable(),
                ])->columns(2),
                Forms\Components\Section::make('Address Information')
                ->schema([
                    Forms\Components\Radio::make('employee_type')
                        ->options([
                            'Employed' => 'Employed',
                            'Self-Employed' => 'Self-Employed',
                            'Unemployed' => 'Unemployed'
                        ]),
                    Forms\Components\TextInput::make('occupation'),
                    Forms\Components\Select::make('occupation_category_id')
                        ->options(OccupationCategory::all()->pluck('name', 'id'))
                        ->searchable()
                        ->label('Category'),
                    Forms\Components\Select::make('nature_of_business_id')
                        ->options(NatureOfBusiness::all()->pluck('name', 'id'))
                        ->searchable()
                        ->label('Nature of Business'),

                        
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar_url')
                    ->label('Photo')
                    ->circular()
                    ->checkFileExistence(false)
                    ->extraImgAttributes(['loading' => 'lazy']),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('first_name')
                    ->hidden()
                    ->searchable(),
                Tables\Columns\TextColumn::make('middle_name')
                    ->hidden()
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->hidden()
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('dependencies_count')
                    ->counts('dependencies')
                    ->alignCenter()
                    ->badge(),
                Tables\Columns\BadgeColumn::make('clientStatus.name')
                    ->color(static function ($state): string {
                        switch ($state) {
                            case "Leads":
                                return 'info';
                            break;
                            case "For Appointment":
                            case "For Presentation":
                            case "Submission of Proposal":
                                return 'warning';
                            break;
                            case "Closed Deal":
                            case "Policy Inforced/Approved":
                                return 'success';
                            break;
                        }
                        return 'primary';
                    })
                    ->searchable()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->modifyQueryUsing(function (Builder $query) { 
                return $query->where('user_id', auth()->id()); 
            }) 
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
            RelationManagers\DependenciesRelationManager::class,
            RelationManagers\PoliciesRelationManager::class,
            RelationManagers\DocumentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}