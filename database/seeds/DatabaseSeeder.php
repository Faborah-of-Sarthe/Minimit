<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AddUsers::class);
        $this->call(AddOeuvres::class);
        $this->call(AddPosters::class);
        $this->call(AddSelections::class);
        $this->call(AddHomeSelections::class);
        $this->call(AddTags::class);
        $this->call(AddNotes::class);
    }
}
