<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Colourable;

class Project extends Model
{
    use Colourable;

    protected $fillable = [
        'name',
        'team_id',
        'description'
    ];

    protected $appends = [
        'users',
        'colour'
    ];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function issues()
    {
        return $this->hasMany('App\Issue');
    }

    public function categories()
    {
        return $this->hasMany('App\ProjectCategory');
    }

    public function getUsersAttribute()
    {
        $ids = collect(
            $this->issues()->get([
                'owner_user_id',
                'assignee_user_id'
            ])
                ->toArray()
        )
            ->flatten()
            ->unique()
            ->values()
            ->all();
        return User::whereIn('id', $ids)->get();
    }

}
