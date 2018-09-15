<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
