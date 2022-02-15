<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('students')->delete();

        // for ($i = 0; $i < 10; $i++) {
        //     \App\Models\Student::create([
        //         'name' => $faker->name(),
        //         'email' => $faker->email(),
        //         'tel' => $faker->phoneNumber(),
        //         'message' => $faker->text()
        //     ]);

        DB::table('students')->insert(
            [
                [ 
                    'name' => 'test',
                    'email' => 'test@test',
                    'tel' => '00000000000',
                    'message' => 'test',
                ],
                [ 
                    'name' => 'test2',
                    'email' => 'test2@test',
                    'tel' => '00000000000',
                    'message' => 'test2',
                ],
                [ 
                    'name' => 'test3',
                    'email' => 'test3@test',
                    'tel' => '00000000000',
                    'message' => 'test3',
                ],
            ]
            );
    }
}
