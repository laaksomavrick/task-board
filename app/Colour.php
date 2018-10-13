<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{

    protected $fillable = [
        'colour'
    ];

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

    public static function colours()
    {
        return [
            0,
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
            10
        ];
    }

    public function colourable()
    {
        return $this->morphTo();
    }

}
