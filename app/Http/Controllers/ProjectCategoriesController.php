<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoriesController extends Controller
{

    public function store(Request $request, Project $project)
    {
        $this->authorize('create', [ProjectCategory::class, $project]);

        $request->validate([
            'name' => 'required'
        ]);

        $projectCategory = ProjectCategory::create([
            'name' => $request['name'],
            'project_id' => $project->id
        ]);

        return $projectCategory;
    }

    public function update(Request $request, Project $project)
    {
    }

    public function destroy(Request $request, Project $project)
    {
    }
}
