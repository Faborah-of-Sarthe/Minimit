<?php

use Illuminate\Database\Seeder;

class AddSelections extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=1; $i < 6; $i++) {
            DB::table('selections')->insert([
                'user_id' => random_int(1, 10),
                'title' => $faker->sentence,
                'active' => true
            ]);
            for ($j=1; $j < 4; $j++) {
                DB::table('poster_selection')->insert([
                    'poster_id' => random_int(1, 10),
                    'selection_id' => $i,
                    'order' => $j
                ]);
            }
        }
    }
}
