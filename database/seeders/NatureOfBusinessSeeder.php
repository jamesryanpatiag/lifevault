<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NatureOfBusiness;

class NatureOfBusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $noBs = [
            "Transportation",
            "Manufacturing",
            "Agriculture",
            "Entertainment",
            "Construction",
            "Services",
            "Freelancing",
            "Real Estate",
            "Mining/Drilling",
            "Research & Development",
            "Hospitality",
            "Retail",
            "Education",
            "Healthcare",
            "Wholesale",
            "Utilities",
            "Financial Services",
            "Information Technology",
            "E-Commerce",
            "Non-Profit",
        ];

        foreach($noBs as $noB) {
            $data = NatureOfBusiness::firstOrNew(['name' => $noB]);
            $data->save();
        }
    }
}
