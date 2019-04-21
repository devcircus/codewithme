<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use App\Events\Models\Session\Created;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Session extends Unguarded
{
    /** @var array */
    protected $dispatchesEvents = [
        'created' => Created::class,
    ];

    /** @var array */
    protected $dates = ['session_date'];

    /** @var array */
    public $appends = [
        'display_date',
    ];

    /** @var array */
    public $colors = [
        'php' => '#4F5D95',
        'ruby' => '#701516',
        'java' => '#B07219',
        'c++' => '#F34B7D',
        'c' => '#555555',
        'javascript' => '#F1E05A',
        'go' => '#375EAB',
        'haskell' => '#5E5086',
        'perl' => '#0298C3',
        'python' => '#3572A5',
        'swift' => '#FFAC45',
        'rust' => '#DEA584',
        'objective-c' => '#438EFF',
        'c#' => '#178600',
        'kotlin' => '#F18E33',
        'elixir' => '#6E4A7E',
        'julia' => '#A270BA',
        'coffeescript' => '#244776',
        'scala' => '#C22D40',
        'clojure' => '#DB5855',
        'hack' => '#878787',
        'html' => '#E34C26',
        'fortran' => '#4D41B1',
        'sql' => '#62A8D6',
        'f#' => '#B845FC',
        'erlang' => '#B83998',
        'lisp' => '#C065DB',
        'elm' => '#60B5CC',
        'coldfusion' => '#ED2CD6',
        'assembly' => '#6E4C13',
        'asp' => '#6A40FD',
        'lua' => '#000080',
        'shell' => '#89E051',
        'dart' => '#00B4AB',
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
        return Carbon::parse($this->attributes['session_date'])->format('l, F jS, g:ia');
    }

    /**
     * Set the language color for the session.
     *
     * @return bool
     */
    public function setLanguageColor()
    {
        $this->language_color = $this->colors[$this->language];

        $this->save();
    }
}
