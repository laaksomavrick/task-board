<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
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
}
