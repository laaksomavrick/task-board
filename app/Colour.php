<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{

    public function colourable()
    {
        return $this->morphTo();
    }

}
