<?php

namespace App\Models;

class Session extends Unguarded
{
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
}
