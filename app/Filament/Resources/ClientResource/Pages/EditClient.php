<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;
use App\Models\ClientStatus;
use App\Enums\ClientStatusEnum;
use App\Models\Client;
use Log;
use Livewire\Component;

class EditClient extends EditRecord
{
    protected static string $resource = ClientResource::class;

    protected function getHeaderActions(): array
    {
        $clientStatus = ClientStatus::where('id', $this->data['client_status_id'])->first();

        if ($clientStatus) {
            switch ($clientStatus->code) {
                case ClientStatusEnum::LEADS:
                    return [
                        Action::make('For Appointment')
                                ->label('For Appointment')
                                ->icon('heroicon-m-calendar-date-range')
                                ->action(function () use ($clientStatus)  {
                                    $newClientStatus = ClientStatus::where('code', ClientStatusEnum::FOR_APPOINTMENT)->first();
                                    $this->updateStatus($newClientStatus);
                                }),
                        Action::make('For Presentation')
                                ->label('For Presentation')
                                ->icon('heroicon-m-tv')
                                ->action(function () use ($clientStatus)  {
                                    $newClientStatus = ClientStatus::where('code', ClientStatusEnum::FOR_PRESENTATION)->first();
                                    $this->updateStatus($newClientStatus);
                                }),
                        Actions\DeleteAction::make(),
                    ];
                break;
                case ClientStatusEnum::FOR_APPOINTMENT:
                    return [
                        Action::make('Back to Leads')
                                ->label('Back to Leads')
                                ->color('info')
                                ->icon('heroicon-m-arrow-uturn-left')
                                ->action(function () use ($clientStatus)  {
                                    $newClientStatus = ClientStatus::where('code', ClientStatusEnum::LEADS)->first();
                                    $this->updateStatus($newClientStatus);
                                }),
                        Action::make('For Presentation')
                                ->label('For Presentation')
                                ->icon('heroicon-m-tv')
                                ->action(function () use ($clientStatus)  {
                                    $newClientStatus = ClientStatus::where('code', ClientStatusEnum::FOR_PRESENTATION)->first();
                                    $this->updateStatus($newClientStatus);
                                }),
                        Actions\DeleteAction::make(),
                    ];
                break;
                case ClientStatusEnum::FOR_PRESENTATION:
                    return [
                        Action::make('Back to Leads')
                                ->label('Back to Leads')
                                ->color('info')
                                ->icon('heroicon-m-arrow-uturn-left')
                                ->action(function () use ($clientStatus)  {
                                    $newClientStatus = ClientStatus::where('code', ClientStatusEnum::LEADS)->first();
                                    $this->updateStatus($newClientStatus);
                                }),
                        Action::make('For Submission of Proposal')
                                ->label('For Submission of Proposal')
                                ->icon('heroicon-m-document')
                                ->action(function () use ($clientStatus)  {
                                    $newClientStatus = ClientStatus::where('code', ClientStatusEnum::SUBMISSION_OF_PROPOSAL)->first();
                                    $this->updateStatus($newClientStatus);
                                }),
                        Actions\DeleteAction::make(),
                    ];
                break;
                case ClientStatusEnum::SUBMISSION_OF_PROPOSAL:
                    return [
                        Action::make('Back to Leads')
                                ->label('Back to Leads')
                                ->color('info')
                                ->icon('heroicon-m-arrow-uturn-left')
                                ->action(function () use ($clientStatus)  {
                                    $newClientStatus = ClientStatus::where('code', ClientStatusEnum::LEADS)->first();
                                    $this->updateStatus($newClientStatus);
                                }),
                        Action::make('Closed Deal')
                                ->label('Closed Deal')
                                ->color('success')
                                ->icon('heroicon-m-check')
                                ->action(function () use ($clientStatus)  {
                                    $newClientStatus = ClientStatus::where('code', ClientStatusEnum::CLOSED_DEAL)->first();
                                    $this->updateStatus($newClientStatus);
                                }),
                        Actions\DeleteAction::make(),
                    ];
                break;
                case ClientStatusEnum::CLOSED_DEAL:
                    return [
                        Action::make('Back to Leads')
                                ->label('Back to Leads')
                                ->color('info')
                                ->icon('heroicon-m-arrow-uturn-left')
                                ->action(function () use ($clientStatus)  {
                                    $newClientStatus = ClientStatus::where('code', ClientStatusEnum::LEADS)->first();
                                    $this->updateStatus($newClientStatus);
                                }),
                        Action::make('Activate Policy')
                                ->label('Activate Policy')
                                ->color('success')
                                ->icon('heroicon-m-check')
                                ->action(function () use ($clientStatus)  {
                                    $newClientStatus = ClientStatus::where('code', ClientStatusEnum::POLICY_INFORCED_APPROVED)->first();
                                    $this->updateStatus($newClientStatus);
                                }),
                        Actions\DeleteAction::make(),
                    ];
                break;
                case ClientStatusEnum::POLICY_INFORCED_APPROVED:
                    return [
                        Action::make('Back to Leads')
                                ->label('Back to Leads')
                                ->color('info')
                                ->icon('heroicon-m-arrow-uturn-left')
                                ->action(function () use ($clientStatus)  {
                                    $newClientStatus = ClientStatus::where('code', ClientStatusEnum::LEADS)->first();
                                    $this->updateStatus($newClientStatus);
                                }),
                        Actions\DeleteAction::make(),
                    ];
                break;
            }
        }
        Log::info($this->data['client_status_id']);
        
    }

    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }

    public function getContentTabLabel(): ?string
    {
        return 'Client Information';
    }

    private function statusChange($status) {
        \Filament\Notifications\Notification::make()
            ->title('Status changed to ' . $status . "!")
            ->success()
            ->send();
    }

    private function updateStatus($newStatus) {
        $this->data['client_status_id'] = $newStatus->id;
        $this->record->client_status_id = $newStatus->id;
        $this->record->save();
        $this->record->refresh();
        $this->js('window.location.reload()');
        $this->statusChange($newStatus->name);
    }
}
