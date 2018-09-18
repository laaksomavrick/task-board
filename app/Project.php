<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected static function boot()
    {
        parent::boot();
    }

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function issues()
    {
        return $this->hasMany('App\Issue');
    }
}
