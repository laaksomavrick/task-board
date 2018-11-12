<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\IssueCreatedEvent;

class Issue extends Model
{
    protected $fillable = [
        'owner_user_id',
        'assignee_user_id',
        'project_id',
        'project_category_id',
        'tag_id',
        'name',
        'description'
    ];

    protected $with = [
        'tag'
    ];

    public static function boot()
    {
        self::created(function ($issue) {
            event(new IssueCreatedEvent($issue));
        });

        parent::boot();
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_user_id');
    }

    public function assignee()
    {
        return $this->belongsTo('App\User', 'assignee_user_id');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }

    public function projectCategory()
    {
        return $this->belongsTo('App\ProjectCategory');
    }
}
