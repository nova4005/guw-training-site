<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hint extends Model
{
    public function problems()
    {
        return $this->belongsTo('App\Problem');
    }
}
