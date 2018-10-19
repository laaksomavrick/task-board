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

        $issue = Issue::create([
            'name' => $request['name'],
            'project_id' => $request['projectId'],
            'project_category_id' => $request['projectCategoryId'],
            'owner_user_id' => auth()->user()->id
        ]);

        return $issue;
    }

    public function show()
    {
        //
    }

    public function update(Request $request, Team $team)
    {
        //
    }
    public function destroy(Team $team)
    {
        //
    }
}
