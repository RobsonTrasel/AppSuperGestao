<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\siteContato::factory()->count(100)->create();
    }
}
