<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PolicyStatusesSeeder::class,
            ClientStatusSeeder::class,
            NatureOfBusinessSeeder::class,
            OccupationCategorySeeder::class
        ]);
        
        $user = new User();
        $user->name = 'James';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('!Password@123');
        $user->save();
    }
}
