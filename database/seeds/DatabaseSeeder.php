<?php

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
        factory(App\Team::class, 5)->create()->each(function ($team) {
            foreach (range(1, 8) as $i) {
                $team->users()->attach(factory(App\User::class)->create());
            }
            foreach (range(1, 5) as $i) {
                $team->projects()->save(factory(App\Project::class)->create(['team_id' => $team->id]));
            }
        });
    }
}
