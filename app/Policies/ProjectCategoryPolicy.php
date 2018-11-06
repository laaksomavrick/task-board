<?php

namespace App\Policies;

use App\User;
use App\ProjectCategory;
use App\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectCategoryPolicy
{
    use HandlesAuthorization;

    public function view(User $user, ProjectCategory $projectCategory)
    {
        return $user->team->id === $projectCategory->team->id;
    }

    public function create(User $user, Project $project)
    {
        return $user->team->id === $project->team->id;
    }

    public function update(User $user, ProjectCategory $projectCategory)
    {
        return $user->team->id === $projectCategory->team->id;
    }

    public function delete(User $user, ProjectCategory $projectCategory)
    {
        return $user->team->id === $projectCategory->team->id;
    }

    public function restore(User $user, ProjectCategory $projectCategory)
    {
        return $user->team->id === $projectCategory->team->id;
    }

    public function forceDelete(User $user, ProjectCategory $projectCategory)
    {
        return false;
    }
}
