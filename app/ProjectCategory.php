<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    // todo: enforce that a project always has at least one category?
    // todo: nameless categories if so?

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function issues()
    {
        return $this->hasMany('App\Issue');
    }
}
