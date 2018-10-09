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
        return $this->morphMany('App\Colour', 'colourable');
    }

}