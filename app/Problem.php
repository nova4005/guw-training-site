<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{

    public function getRouteKeyName()
    {
        return 'type';
    }

    public function hints()
    {
        return $this->hasMany('App\Hint');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps()->using('App\UserProblem');
    }
}
