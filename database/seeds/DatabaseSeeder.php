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
        factory('App\Team', 5)->create()->each(function ($team) {
            // each team will have 5 users
            $users = factory('App\User', 5)->create([
                'team_id' => $team->id
            ]);

            // each team will have 5 projects
            $projects = factory('App\Project', 5)->create([
                'team_id' => $team->id
            ]);

            // each team will have 15 issues
            $issues = factory('App\Issue', 15)->create([
                'owner_user_id' => $team->users()->inRandomOrder()->first()->id,
                'assignee_user_id' => $team->users()->inRandomOrder()->first()->id,
                'project_id' => $team->projects()->inRandomOrder()->first()->id
            ]);
        });
    }
}
