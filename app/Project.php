<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
