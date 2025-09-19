<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClientStatus;

class ClientStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientStatus = new ClientStatus();
        $clientStatus->code = 'LEADS';
        $clientStatus->name = 'Leads';
        $clientStatus->save();

        $clientStatus = new ClientStatus();
        $clientStatus->code = 'FOR_APPOINTMENT';
        $clientStatus->name = 'For Appointment';
        $clientStatus->save();

        $clientStatus = new ClientStatus();
        $clientStatus->code = 'FOR_PRESENTATION';
        $clientStatus->name = 'For Presentation';
        $clientStatus->save();

        $clientStatus = new ClientStatus();
        $clientStatus->code = 'SUBMISSION_OF_PROPOSAL';
        $clientStatus->name = 'Submission of Proposal';
        $clientStatus->save();

        $clientStatus = new ClientStatus();
        $clientStatus->code = 'CLOSED_DEAL';
        $clientStatus->name = 'Closed Deal';
        $clientStatus->save();

        $clientStatus = new ClientStatus();
        $clientStatus->code = 'POLICY_INFORCED_APPROVED';
        $clientStatus->name = 'Policy Inforced/Approved';
        $clientStatus->save();
    }
}
