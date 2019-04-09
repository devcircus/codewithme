<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unguarded extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
