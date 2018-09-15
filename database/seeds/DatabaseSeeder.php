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
                $project = $team->projects()->save(factory(App\Project::class)->create(['team_id' => $team->id]));
                foreach (range(1, 5) as $i) {
                    $project->issues()->save(factory(App\Issue::class)->create(['project_id' => $project->id, 'user_id' => $team->users()->inRandomOrder()->first()->id]));
                }
            }
        });
    }
}
