<?php

use Illuminate\Database\Seeder;

class SubjectStudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 20; $i++) {
            DB::table('student_subject')->insert([
                    'subject_id' => rand(1,20),
                    'student_id' => rand(1,20),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            );
        }
    }
}
