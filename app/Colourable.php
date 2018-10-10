<?php

namespace App;

trait Colourable
{

    public static function bootColourable()
    {
        static::created(function ($model) {
            $model->colour()->create();
        });
    }

    public function colour()
    {
        return $this->morphOne('App\Colour', 'colourable');
    }

    public function getColourAttribute()
    {
        return $this->colour()->first()->colour;
    }

}