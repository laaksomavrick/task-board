<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('todoCount', function (Builder $builder) {
            return $builder->withCount('todoIssues');
        });

        static::addGlobalScope('inProgressCount', function (Builder $builder) {
            return $builder->withCount('inProgressIssues');
        });

        static::addGlobalScope('doneCount', function (Builder $builder) {
            return $builder->withCount('doneIssues');
        });

    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function issues()
    {
        return $this->hasManyThrough('App\Issue', 'App\Project');
    }

    public function todoIssues()
    {
        return $this->issues()->whereStatus('todo');
    }

    public function inProgressIssues()
    {
        return $this->issues()->whereStatus('inprogress');
    }

    public function doneIssues()
    {
        return $this->issues()->whereStatus('done');
    }

}
