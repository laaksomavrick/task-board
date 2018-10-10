<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Colourable;

class User extends Authenticatable
{
    use Notifiable;
    use Colourable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'initials',
        'colour'
    ];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function issues()
    {
        return $this->hasMany('App\Issues');
    }

    public function getInitialsAttribute()
    {
        // https://stackoverflow.com/questions/9706429/get-first-letter-of-each-word
        preg_match_all('#(?<=\s|\b)\pL#u', $this->name, $res);
        $initials = implode('', $res[0]);

        if (strlen($initials) < 2 || strlen($initials) > 2) {
            $initials = strtoupper(substr($this->name, 0, 2));
        }
        return strtoupper($initials);
    }
}
