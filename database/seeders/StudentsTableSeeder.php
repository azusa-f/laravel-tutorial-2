<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

//studentsテーブルにテストデータ登録
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //既存データ削除
        DB::table('students')->delete();
        
        //テストデータ登録
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
