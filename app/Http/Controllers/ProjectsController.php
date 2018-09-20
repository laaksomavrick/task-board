<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        return Project::create([
            'name' => $request['name']
        ]);
    }
}
