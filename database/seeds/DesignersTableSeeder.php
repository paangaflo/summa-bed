<?php

use App\Designer;
use Illuminate\Database\Seeder;

class DesignersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Designer::create([
                'id' => 1,
                'type' => 'GRAFICO',
                'employees_id' => 2
        ]);
        Designer::create([
                'id' => 2,
                'type' => 'WEB',
                'employees_id' => 4
        ]);
        Designer::create([
                'id' => 3,
                'type' => 'GRAFICO',
                'employees_id' => 6
        ]);
        Designer::create([
                'id' => 4,
                'type' => 'WEB',
                'employees_id' => 8
        ]);
        Designer::create([
                'id' => 5,
                'type' => 'GRAFICO',
                'employees_id' => 11
        ]);
        Designer::create([
                'id' => 6,
                'type' => 'WEB',
                'employees_id' => 14
        ]);
    }
}