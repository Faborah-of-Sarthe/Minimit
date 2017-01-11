<?php

use Illuminate\Database\Seeder;

class AddUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        DB::table('users')->insert([
            'name' => 'Minimit',
            'email' => env('ADMIN_MAIL', 'admin@example.com'),
            'password' => bcrypt(env('ADMIN_PASSWORD', 'password')),
            'active' => 1,
            'is_admin' => 1
        ]);

        // Dummies
        for ($i = 0; $i < 10; $i++) {
            $faker = Faker\Factory::create();
            DB::table('users')->insert([
                'name' => $faker->domainWord,
                'email' => $faker->email,
                'password' => bcrypt('secret'),
                'active' => 1
            ]);
        }
    }
}
