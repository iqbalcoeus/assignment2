<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'status', 'category',
        'ended_at',
    ];

    /**
     * defining relationship with tasks
     * @return Tasks with in project
     */
    public function tasks(){
        return $this->hasMany('App\Task');
    }
}
