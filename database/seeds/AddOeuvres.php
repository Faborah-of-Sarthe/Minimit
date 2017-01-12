<?php

use Illuminate\Database\Seeder;

class AddOeuvres extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Simple set of movies for our tests

        DB::table('oeuvre')->insert([
            'title_ov' => "Hauru no ugoku shiro",
            'title_en' => "Howl's Moving Castle",
            'title_fr' => "Le château ambulant",
            'year' => '2004',
            'active' => 1
        ]);

        DB::table('oeuvre')->insert([
            'title_ov' => "Aladdin",
            'title_en' => "Aladdin",
            'title_fr' => "Aladdin",
            'year' => '1992',
            'active' => 1
        ]);

        DB::table('oeuvre')->insert([
            'title_ov' => "The AristoCats",
            'title_en' => "The AristoCats",
            'title_fr' => "Les aristochats",
            'year' => '1970',
            'active' => 1
        ]);

        DB::table('oeuvre')->insert([
            'title_ov' => "Finding Nemo",
            'title_en' => "Finding Nemo",
            'title_fr' => "Le monde de Nemo",
            'year' => '2003',
            'active' => 1
        ]);

        DB::table('oeuvre')->insert([
            'title_ov' => "Her",
            'title_en' => "Her",
            'title_fr' => "Her",
            'year' => '2013',
            'active' => 1
        ]);

        DB::table('oeuvre')->insert([
            'title_ov' => "Léon",
            'title_en' => "Léon: The Professional",
            'title_fr' => "Léon",
            'year' => '1970',
            'active' => 1
        ]);

        DB::table('oeuvre')->insert([
            'title_ov' => "The Shining",
            'title_en' => "The Shining",
            'title_fr' => "Shining",
            'year' => '1980',
            'active' => 1
        ]);

        DB::table('oeuvre')->insert([
            'title_ov' => "Back to the Future",
            'title_en' => "Back to the Future",
            'title_fr' => "Retour vers le futur",
            'year' => '1985',
            'active' => 1
        ]);

        DB::table('oeuvre')->insert([
            'title_ov' => "Back to the Future Part II",
            'title_en' => "Back to the Future Part II",
            'title_fr' => "Retour vers le futur 2",
            'year' => '1989',
            'active' => 1
        ]);

        DB::table('oeuvre')->insert([
            'title_ov' => "Back to the Future Part III",
            'title_en' => "Back to the Future Part III",
            'title_fr' => "Retour vers le futur 3",
            'year' => '1990',
            'active' => 1
        ]);
    }
}
