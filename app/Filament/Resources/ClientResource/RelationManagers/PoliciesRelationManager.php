<?php

namespace App\Filament\Resources\ClientResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\PolicyStatus;

class PoliciesRelationManager extends RelationManager
{
    protected static string $relationship = 'policies';

    protected static ?string $icon = 'heroicon-m-document-text';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                ->schema([
Forms\Components\TextInput::make('policy_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('policy_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('policy_provider')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('policy_amount')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('policy_start_date')
                    ->required(),
                Forms\Components\DatePicker::make('policy_end_date')
                    ->required(),
                Forms\Components\DatePicker::make('policy_due_date')
                    ->required(),
                Forms\Components\Select::make('policy_currency')
                    ->options([
                        'PHP' => 'PHP',
                        'USD' => 'USD',
                        'EUR' => 'EUR',
                        'GBP' => 'GBP',
                        'JPY' => 'JPY',
                        'AUD' => 'AUD',
                        'CAD' => 'CAD',
                        'CHF' => 'CHF',
                        'CNY' => 'CNY',
                        'SEK' => 'SEK',
                        'NZD' => 'NZD',
                    ]),
                Forms\Components\Checkbox::make('policy_owner_self')
                    ->label('Is the policy owner the client?')
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state) {
                            $set('policy_owner_id', null);
                        }
                    }),
                Forms\Components\Select::make('policy_owner_id')
                    ->label('Beneficiary as Policy Owner')
                    ->relationship('policyOwner', 'first_name')
                    ->searchable()
                    ->preload()
                    ->disabled(fn ($get) => $get('policy_owner_self')),
                Forms\Components\Checkbox::make('policy_insured_self')
                    ->label('Is the policy insured the client?')
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state) {
                            $set('policy_insured_id', null);
                        }
                    }),
                Forms\Components\Select::make('policy_insured_id')
                    ->label('Beneficiary as Policy Insured')
                    ->relationship('policyInsured', 'first_name')
                    ->searchable()
                    ->preload()
                    ->disabled(fn ($get) => $get('policy_insured_self')),
                Forms\Components\Select::make('policy_status_id')
                    ->label('Policy Status')
                    ->options(PolicyStatus::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('relationship_to_the_policy_owner')
                    ->required()
                    ->maxLength(255),
                ])->columns(2)
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('policy_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('policy_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('policyStatus.name')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('New Policy')
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
}
