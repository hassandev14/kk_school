<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\My_classes;
use App\Models\Employe;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Teacher::factory(10)->create();
        Student::factory(10)->create();
        My_classes::factory(10)->create();
        Employe::factory(10)->create();
    }
}
