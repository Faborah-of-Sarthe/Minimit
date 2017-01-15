<?php

use Illuminate\Database\Seeder;

class AddTags extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'title_fr' => 'Genre',
            'title_en' => 'Genre',
            'description_fr' => 'Films appartenant à un même genre (Comédie, Sci-Fi, Drame...)',
            'description_en' => 'Films sharing a same genre (Comedy, Sci-Fi, Drama...)',
            'code' => 'genre'
        ]);

        DB::table('tags')->insert([
            'title_fr' => 'Thématique',
            'title_en' => 'Thematic',
            'description_fr' => "Films autour d'une même thématique (Noël, Roadtrip, Zombies...)",
            'description_en' => 'Films around a same theme (Christmas, Roadtrip, Zombies...)',
            'code' => 'thematic'
        ]);

        DB::table('tags')->insert([
            'title_fr' => 'Date de sortie',
            'title_en' => 'Release date',
            'description_fr' => "Films sortis à une mếme époque (1989, années 90)",
            'description_en' => 'Films released around a same period (1989, nineties)',
            'code' => 'period'
        ]);

        DB::table('tags')->insert([
            'title_fr' => 'Pays, culture',
            'title_en' => 'Country, culture',
            'description_fr' => "Films issus du même pays, région, culture (Italie, Bollywood, Breizh)",
            'description_en' => 'Films from a same country, area, culture (France, Bollwood, Italy)',
            'code' => 'country'
        ]);

        DB::table('tags')->insert([
            'title_fr' => 'Artiste',
            'title_en' => 'Artist',
            'description_fr' => "Films liés à un acteur, réalisateur, compositeur...",
            'description_en' => 'Films related to an actor, director, composer...',
            'code' => 'artist'
        ]);

        for ($i=1; $i < 6; $i++) {
            DB::table('selection_tag')->insert([
                'tag_id' => random_int(1,5),
                'selection_id' => random_int(1,5)
            ]);
        }
    }
}
