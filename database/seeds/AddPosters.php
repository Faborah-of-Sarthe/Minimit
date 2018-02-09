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
        //$faker = Faker\Factory::create();
        for ($i=1; $i < 9; $i++) {
            DB::table('posters')->insert([
                'user_id' => random_int(1, 10),
                'oeuvre_id' => $i,
            ]);
            DB::table('images')->insert([
//                'poster_id' => $i,
                'filepath' => 'poster_'.$i.'_image_1.png',
                'level' => '1'
            ]);
        }
        // extra image for Leon
        DB::table('images')->insert([
//            'poster_id' => 6,
            'filepath' => 'poster_6_image_2.png',
            'level' => '2'
        ]);
    }
}
