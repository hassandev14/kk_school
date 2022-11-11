<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'student_name' => Str::random(8),
            'father_name' => Str::random(8),
            'address' => Str::random(8),
            'gender' => Str::random(8),
            'phone' => Str::random(11),
            'roll_no' => Str::random(2),
            'image_name' => Str::random(10)
        ]);
    }
}
