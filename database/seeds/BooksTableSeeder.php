<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeScriptID = DB::table('shelves')->where('type', '=', 'TypeScript')->value('id');
        $laravelID = DB::table('shelves')->where('type', '=', 'Laravel')->value('id');
        $phpID = DB::table('shelves')->where('type', '=', 'Php')->value('id');

        $typeScriptBooks = [
            ['title' => 'Beginning Angular 2 with Typescript', 'authors' => 'Greg Lim', 'shelves_id' => $typeScriptID],
            ['title' => 'Angular 2 Development with TypeScript', 'authors' => 'Yakov Fain,Anton Moiseev', 'shelves_id' => $typeScriptID],
        ];

        $laravelBooks = [
            ['title' => 'Laravel 5 Essentials', 'authors' => 'Martin Bean', 'shelves_id' => $laravelID],
            ['title' => 'The Laravel Survival Guide', 'authors' => 'Tony Lea', 'shelves_id' => $laravelID],
        ];

        $phpBooks = [
            ['title' => 'The Joy of PHP Programming: A Beginner’s Guide', 'authors' => 'Alan Forbes', 'shelves_id' => $phpID],
            ['title' => 'PHP & MYSQL Novice to Ninja', 'authors' => 'Kevin Yank', 'shelves_id' => $phpID],
        ];

        foreach ($typeScriptBooks as $books) {
            DB::table('books')->insert($books);
        }

        foreach ($laravelBooks as $books) {
            DB::table('books')->insert($books);
        }

        foreach ($phpBooks as $books) {
            DB::table('books')->insert($books);
        }
    }
}
