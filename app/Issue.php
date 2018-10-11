<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $with = [
        'tag'
    ];

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_user_id');
    }

    public function assignee()
    {
        return $this->belongsTo('App\User', 'assignee_user_id');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }

    public function projectCategory()
    {
        return $this->belongsTo('App\ProjectCategory');
    }
}
