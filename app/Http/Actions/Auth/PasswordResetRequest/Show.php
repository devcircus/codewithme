<?php

namespace App\Http\Actions\Auth\PasswordResetRequest;

use Inertia\Inertia;
use PerfectOblivion\Actions\Action;

class Show extends Action
{
    /**
     * Execute the action.
     */
    public function __invoke()
    {
        return Inertia::render('Auth/Passwords/Email');
    }
}
