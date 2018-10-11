<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Colourable;

class Tag extends Model
{
    use Colourable;

    protected $appends = [
        'colour'
    ];

    public function issues()
    {
        return $this->hasMany('App\Issue');
    }
}
