<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
//        $this->call(GroupTableSeeder::class);
//        $this->call(StudentTableSeeder::class);
//        $this->call(SubjectTableSeeder::class);
        $this->call(SubjectStudentTableSeeder::class);
    }
}
