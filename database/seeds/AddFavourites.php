<?php

use Illuminate\Database\Seeder;

class AddFavourites extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favourites')->insert([
            'user_id' => 2,
            'selection_id' => 3,
        ]);
        DB::table('favourites')->insert([
            'user_id' => 2,
            'selection_id' => 4,
        ]);
        DB::table('favourites')->insert([
            'user_id' => 6,
            'selection_id' => 1,
        ]);
        DB::table('favourites')->insert([
            'user_id' => 3,
            'selection_id' => 2,
        ]);
    }
}
