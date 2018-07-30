<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AlbumsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shelveID = DB::table('shelves')->where('type', '=', 'albums')->value('id');

        $albums = [
            ['title' => 'Billboard 200', 'singer' => 'Drake', 'shelves_id' => $shelveID],
            ['title' => 'Rolling Papers2', 'singer' => 'Post Malone', 'shelves_id' => $shelveID],
            ['title' => 'Invasion Of Privacy', 'singer' => 'Cardi B', 'shelves_id' => $shelveID],
            ['title' => 'Goodbye & Good Riddance', 'singer' => 'Juice WRLD', 'shelves_id' => $shelveID],
            ['title' => 'The Greatest Showman', 'singer' => 'Soundtrack', 'shelves_id' => $shelveID],
            ['title' => 'Harder Thank Ever', 'singer' => 'Lil Baby', 'shelves_id' => $shelveID],
            ['title' => 'Red Pill Blues', 'singer' => 'Maroon 5', 'shelves_id' => $shelveID],
            ['title' => 'This One\'s For You', 'singer' => 'Luke Combs', 'shelves_id' => $shelveID],
            ['title' => 'BEASTMODE 2', 'singer' => 'Future', 'shelves_id' => $shelveID],
            ['title' => 'EVERYTHING IS LOVE', 'singer' => 'The Carters', 'shelves_id' => $shelveID],
        ];

        foreach ($albums as $album) {
            DB::table('albums')->insert($album);
        }
    }
}
