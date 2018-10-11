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

            $tags = factory('App\Tag', 5)->create([
                'team_id' => $team->id
            ]);

            $users->each(function ($user) {
                $user->colour()->update(['colour' => rand(0, 10)]);
            });

            $tags->each(function ($tag) {
                $tag->colour()->update(['colour' => rand(0, 10)]);
            });

            // each team will have 5 projects
            $projects = factory('App\Project', 5)->create([
                'team_id' => $team->id
            ])->each(function ($project) use ($team) {

                $project->colour()->update(['colour' => rand(0, 10)]);

                // each project will have 3 categories

                $categories = factory('App\ProjectCategory', 3)->create([
                    'project_id' => $project->id
                ])->each(function ($category) use ($team, $project) {

                    // each project will have 2 issues
                    // foreach for rand
                    foreach (range(0, 1) as $i) {
                        $issues = factory('App\Issue')->create([
                            'owner_user_id' => $team->users()->inRandomOrder()->first()->id,
                            'assignee_user_id' => $team->users()->inRandomOrder()->first()->id,
                            'tag_id' => $team->tags()->inRandomOrder()->first()->id,
                            'project_category_id' => $category->id,
                            'project_id' => $project->id
                        ]);
                    }

                });

            });

        });
    }
}
