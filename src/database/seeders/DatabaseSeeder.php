<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()
            ->has(\App\Models\WeightTarget::factory())
            ->has(\App\Models\WeightLog::factory()->count(35))
            ->count(5)
            ->create();
    }
}
