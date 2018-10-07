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

    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project);

        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $project->update([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);

        return Project::find($project->id);
    }

    public function destroy(Request $request, Project $project)
    {
        $this->authorize('delete', $project);
        $project->delete();
        return $project;
    }
}
