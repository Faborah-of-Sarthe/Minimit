<?php

use Illuminate\Database\Seeder;

class AddPosters extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=1; $i < 11; $i++) {
            DB::table('posters')->insert([
                'user_id' => random_int(1, 10),
                'oeuvre_id' => random_int(1, 10),
            ]);
            DB::table('images')->insert([
                'poster_id' => $i,
                'filepath' => $faker->mimeType,
                'level' => '1'
            ]);
        }
    }
}
