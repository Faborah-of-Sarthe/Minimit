<?php

use Illuminate\Database\Seeder;

class AddNotes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->insert([
            'user_id' => 2,
            'selection_id' => 1,
            'note' => 1,
        ]);
        DB::table('notes')->insert([
            'user_id' => 2,
            'selection_id' => 2,
            'note' => 3,
        ]);
        DB::table('notes')->insert([
            'user_id' => 3,
            'selection_id' => 1,
            'note' => 4,
        ]);
        DB::table('notes')->insert([
            'user_id' => 3,
            'selection_id' => 2,
            'note' => 5,
        ]);
    }
}
