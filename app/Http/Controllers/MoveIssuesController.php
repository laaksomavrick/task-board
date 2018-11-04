<?php

namespace App\Http\Controllers;

use App\ProjectCategory;
use App\Issue;
use Illuminate\Http\Request;

class MoveIssuesController extends Controller
{
    // this should be better
    // todo: fix, test coverage
    public function update(ProjectCategory $category, Request $request)
    {
        $request->validate([
            'ids' => 'required'
        ]);

        $issues = Issue::whereIn('id', $request['ids'])->get();
        $category->issues()->saveMany($issues);
        return $category;
    }
}
