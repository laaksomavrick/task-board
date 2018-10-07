<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    public function show(Project $project)
    {
        return $project->load('categories.issues');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        return Project::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'team_id' => auth()->user()->team->id
        ]);
    }

    public function destroy(Request $request, Project $project)
    {
        $this->authorize('delete', $project);
        $project->delete();
        return $project;
    }
}
