<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserProblem extends Pivot
{
    protected $table = 'problem_user';
}
