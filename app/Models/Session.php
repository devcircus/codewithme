<?php

namespace App\Models;

use Illuminate\Support\Carbon;

class Session extends Unguarded
{
    /** @var array */
    protected $dates = ['session_date'];

    /** @var array */
    public $appends = [
        'display_date',
    ];

    /**
     * A Session belongs to many paired developers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pairedDevs()
    {
        return $this->belongsToMany(User::class)->withPivot('confirmed');
    }

    /**
     * A session belongs to a creator.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * Get the session date in displayable format.
     *
     * @return string
     */
    public function getDisplayDateAttribute()
    {
        return Carbon::parse($this->attributes['session_date'])->format('l, F jS, g:i a');
    }
}
