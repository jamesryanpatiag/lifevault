<?php

namespace App\Filament\Resources\ClientResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\NatureOfBusiness;
use App\Models\OccupationCategory;
use Filament\Forms\Components\FileUpload;
use Parfaitementweb\FilamentCountryField\Forms\Components\Country;

class DependenciesRelationManager extends RelationManager
{
    protected static string $relationship = 'dependencies';
    
    protected static ?string $icon = 'heroicon-m-users';

    protected static ?string $title = 'Beneficiaries';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
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
                    Forms\Components\Checkbox::make('is_same_as_primary')
                        ->label('Is Same as Primary Address')
                        ->default(false)
                        ->afterStateUpdated(function ($state, callable $set) {
                            $set('address_1', $this->getOwnerRecord()->address_1);
                            $set('address_2', $this->getOwnerRecord()->address_2);
                            $set('city', $this->getOwnerRecord()->city);
                            $set('province', $this->getOwnerRecord()->province);
                            $set('postal', $this->getOwnerRecord()->postal);
                            $set('country', $this->getOwnerRecord()->country);
                        })
                        ->live()
                        ->columnSpanFull(),
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
                Forms\Components\Section::make('Percentage of Benefit')
                ->schema([
                    Forms\Components\TextInput::make('percentage_of_benefit')
                        ->label('Percentage of Benefit (%)')
                        ->maxLength(255),
                ])->columns(1),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('email')
            ->columns([
                Tables\Columns\ImageColumn::make('avatar_url')
                    ->label('Photo')
                    ->circular()
                    ->checkFileExistence(false)
                    ->extraImgAttributes(['loading' => 'lazy']),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('middle_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('percentage_of_benefit')
                    ->label('PB (%)')
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
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('New Beneficiary')
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['user_id'] = auth()->id();
                        $data['client_id'] = $this->ownerRecord->id;
                        return $data;
                    }),
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

    protected function beforeSave(): void
    {
        $data['user_id'] = auth()->id();
        $data['client_id'] = $this->ownerRecord->id;
    }
}
