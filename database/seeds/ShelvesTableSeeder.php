<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShelvesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $shelves = [
            ['type' => 'TypeScript'],
            ['type' => 'Laravel'],
            ['type' => 'Php'],
            ['type' => 'albums'],
        ];

        foreach ($shelves as $shelve) {
            DB::table('shelves')->insert($shelve);
        }
    }
}
