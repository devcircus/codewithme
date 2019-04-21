<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Session extends Unguarded
{
    /** @var array */
    protected $dates = ['session_date'];

    /** @var array */
    public $appends = [
        'display_date',
    ];

    /**
     * Scope sessions to those owned by the given creator.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  mixed  $creatorId
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCreatedBy(Builder $builder, $creatorId)
    {
        if (is_int($creatorId)) {
            return $builder->where('creator_id', $creatorId);
        } elseif ($creatorId instanceof User) {
            return $builder->where('creator_id', $creatorId->id);
        }

        throw new ModelNotFoundException('User with the given id not found.');
    }

    /**
     * Scope sessions to those after the current moment, or after the optional startDate.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  mixed|null  $startDate
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUpcoming(Builder $builder, $startDate = null)
    {
        return $builder->where('session_date', '>', Carbon::parse($startDate));
    }

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
     * A session is owned by a creator.
     * Alias of creator.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->creator();
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
