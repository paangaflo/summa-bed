<?php

use App\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
                'id' => 1,
                'name' => 'Summa Solutions'
        ]);
        Company::create([
                'id' => 2,
                'name' => 'Suramericana'
        ]);
        Company::create([
                'id' => 3,
                'name' => 'Google'
        ]);
        Company::create([
                'id' => 4,
                'name' => 'Amazon'
        ]);
    }
}