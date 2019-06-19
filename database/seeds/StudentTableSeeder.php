<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 20 students
        for ($i = 0; $i < 20; $i++) {
            DB::table('students')->insert([
                    'username' => Str::random(10),
                    'fullname' => Str::random(10),
                    'email' => Str::random(10)."@gmail.com",
                    'address' => Str::random(10),
                    'group_id' => rand(1, 5),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            );
        }
    }
}
