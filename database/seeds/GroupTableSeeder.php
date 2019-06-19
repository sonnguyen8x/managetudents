<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 5 group
        for ($i = 0; $i < 5; $i++) {
            DB::table('groups')->insert([
                    'name' => Str::random(10),
                    'major' => Str::random(10),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            );
        }

    }
}
