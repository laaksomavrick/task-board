<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{

    public static function boot()
    {
        self::creating(function ($model) {
            $colour = $model->colour;
            if ($colour < 0 || $colour > 10) {
                return false;
            }
        });

        parent::boot();
    }

    public function colourable()
    {
        return $this->morphTo();
    }

}
