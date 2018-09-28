<?php

namespace App\Http\Controllers;

use App\ProjectCategory;
use App\Issue;
use Illuminate\Http\Request;

class MoveIssuesController extends Controller
{

    public function update(ProjectCategory $category, Request $request)
    {
        // todo this is broken

        $request->validate([
            'ids' => 'required'
        ]);

        $issues = Issue::whereIn('id', $request['ids'])->get();
        $category->issues()->delete();
        return $category->issues()->saveMany($issues);
    }
}
