<?php

use Illuminate\Database\Seeder;

class AddHomeSelections extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=1; $i < 4; $i++) {
            DB::table('selections_home')->insert([
                'selection_id' => $i,
                'title_fr' => $faker->sentence,
                'title_en' => $faker->sentence,
                'filepath' => $faker->mimeType,
                'order' => $i,
                'active' => true
            ]);
        }
    }
}
