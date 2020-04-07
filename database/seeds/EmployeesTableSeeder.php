<?php

use App\Employee;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
                'id' => 1,
                'name' => 'Pablo Andres',
                'surname' => 'Galvis Florez',
                'age' => 34,
                'companies_id' => 1
        ]);
        Employee::create([
                'id' => 2,
                'name' => 'Malena',
                'surname' => 'Mendoza',
                'age' => 25,
                'companies_id' => 1
        ]);
        Employee::create([
                'id' => 3,
                'name' => 'Santino',
                'surname' => 'Lopez',
                'age' => 37,
                'companies_id' => 1
        ]);
        Employee::create([
                'id' => 4,
                'name' => 'Lorenzo',
                'surname' => 'Silva',
                'age' => 28,
                'companies_id' => 1
        ]);
        Employee::create([
                'id' => 5,
                'name' => 'Valentino',
                'surname' => 'Soria',
                'age' => 26,
                'companies_id' => 1
        ]);
        Employee::create([
                'id' => 6,
                'name' => 'Emma',
                'surname' => 'Diaz',
                'age' => 38,
                'companies_id' => 1
        ]);
        Employee::create([
                'id' => 7,
                'name' => 'Joaquin',
                'surname' => 'Gonzalez',
                'age' => 31,
                'companies_id' => 1
        ]);
        Employee::create([
                'id' => 8,
                'name' => 'Martin',
                'surname' => 'Bravo',
                'age' => 35,
                'companies_id' => 1
        ]);
        Employee::create([
                'id' => 9,
                'name' => 'Juan Pablo',
                'surname' => 'Vargas Perez',
                'age' => 29,
                'companies_id' => 2
        ]);
        Employee::create([
                'id' => 10,
                'name' => 'Alejandra',
                'surname' => 'Acosta',
                'age' => 37,
                'companies_id' => 2
        ]);
        Employee::create([
                'id' => 11,
                'name' => 'Maria Camila',
                'surname' => 'Garcia Zaldarriaga',
                'age' => 36,
                'companies_id' => 2
        ]);
        Employee::create([
                'id' => 12,
                'name' => 'Freddie',
                'surname' => 'Smith',
                'age' => 37,
                'companies_id' => 3
        ]);
        Employee::create([
                'id' => 13,
                'name' => 'Alton',
                'surname' => 'Lennon',
                'age' => 28,
                'companies_id' => 3
        ]);
        Employee::create([
                'id' => 14,
                'name' => 'Ben',
                'surname' => 'Abramson',
                'age' => 43,
                'companies_id' => 3
        ]);
    }
}