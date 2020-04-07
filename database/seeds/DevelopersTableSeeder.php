<?php

use App\Developer;
use Illuminate\Database\Seeder;

class DevelopersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Developer::create([
                'id' => 1,
                'lang' => 'PHP',
                'employees_id' => 1
        ]);
        Developer::create([
                'id' => 2,
                'lang' => 'NET',
                'employees_id' => 3
        ]);
        Developer::create([
                'id' => 3,
                'lang' => 'PYTHON',
                'employees_id' => 5
        ]);
        Developer::create([
                'id' => 4,
                'lang' => 'PHP',
                'employees_id' => 7
        ]);
        Developer::create([
                'id' => 5,
                'lang' => 'NET',
                'employees_id' => 9
        ]);
        Developer::create([
                'id' => 6,
                'lang' => 'PYTHON',
                'employees_id' => 10
        ]);
        Developer::create([
                'id' => 7,
                'lang' => 'PHP',
                'employees_id' => 12
        ]);
        Developer::create([
                'id' => 8,
                'lang' => 'NET',
                'employees_id' => 13
        ]);
    }
}