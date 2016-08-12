<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'status', 'category',
        'ended_at', 'project_id',
    ];

    public function project(){

    	return $this->belongsTo('App\Project');
    }

    /**
     * The users that belong to the user.
     */
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
