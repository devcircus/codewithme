<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * A User has many created sessions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdSessions()
    {
        return $this->hasMany(Session::class, 'creator_id');
    }

    /**
     * A User belongs to many paired sessions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pairedSessions()
    {
        return $this->belongsToMany(Session::class)->withPivot('confirmed');
    }

    /**
     * Get the upcoming sessions created by the User.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function upcomingCreatedSessions()
    {
        return $this->createdSessions()->upcoming()->get();
    }

    /**
     * Get the upcoming sessions joined by the User.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function upcomingPairedSessions()
    {
        return $this->pairedSessions()->upcoming()->get();
    }

    /**
     * Get the next created session for the user.
     *
     * @return \App\Models\Session
     */
    public function nextCreatedSession()
    {
        return $this->createdSessions->sortBy('session_date')->first();
    }

    /**
     * Get the next paired session for the user.
     *
     * @return \App\Models\Session
     */
    public function nextPairedSession()
    {
        return $this->pairedSessions->sortBy('session_date')->first();
    }
}
