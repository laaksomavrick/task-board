<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Project extends Model
{

    protected $fillable = [
        'name',
        'team_id',
        'description'
    ];

    protected $appends = [
        'users'
    ];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function issues()
    {
        return $this->hasMany('App\Issue');
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
