<?php

namespace App\Http\Controllers;

use App\User;
use App\Issue;
use App\Project;
use Illuminate\Http\Request;

class IssuesController extends Controller
{

    public function store(Request $request, Project $project)
    {

        $this->authorize('create', [Issue::class, $project]);

        $request->validate([
            'name' => 'required',
            'projectId' => 'required',
            'projectCategoryId' => 'required'
        ]);

        ['name' => $name, 'projectId' => $projectId, 'projectCategoryId' => $projectCategoryId] = $request;

        $issue = Issue::create([
            'name' => $name,
            'project_id' => $projectId,
            'project_category_id' => $projectCategoryId,
            'owner_user_id' => auth()->user()->id
        ]);

        return $issue;
    }

    public function show()
    {
        //
    }

    public function update(Request $request, Project $project, Issue $issue)
    {
        $this->authorize('update', [Issue::class, $project]);

        $request->validate([
            'name' => 'required',
            'description' => 'present'
        ]);

        ['name' => $name, 'description' => $description] = $request;

        $issue->update([
            'name' => $name,
            'description' => $description
        ]);

        return $issue;

    }
    public function destroy(Team $team)
    {
        //
    }
}
