<?php

namespace App\Policies;

use App\User;
use App\Issue;
use App\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class IssuePolicy
{
    use HandlesAuthorization;

    public function view(User $user, Issue $issue)
    {
        return $user->team->id === $issue->team->id;
    }

    public function create(User $user, Project $project)
    {
        return $user->team->id === $project->team->id;
    }

    public function update(User $user, Issue $issue)
    {
        return $user->team->id === $issue->team->id;
    }

    public function delete(User $user, Issue $issue)
    {
        return $user->team->id === $issue->team->id;
    }

    public function restore(User $user, Issue $issue)
    {
        return $user->team->id === $issue->team->id;
    }

    public function forceDelete(User $user, Issue $issue)
    {
        return false;
    }
}
