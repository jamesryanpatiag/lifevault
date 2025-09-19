<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PolicyStatus;

class PolicyStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policyStatus = new PolicyStatus();
        $policyStatus->code = 'INFORCED';
        $policyStatus->name = 'Inforced';
        $policyStatus->save();
    }
}
