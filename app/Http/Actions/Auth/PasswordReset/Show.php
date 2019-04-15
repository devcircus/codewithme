<?php

namespace App\Http\Actions\Auth\PasswordReset;

use Inertia\Inertia;
use Illuminate\Http\Request;
use PerfectOblivion\Actions\Action;

class Show extends Action
{
    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, ?string $token = null)
    {
        abort_unless($token, 404);

        return Inertia::render('Auth/Passwords/Reset', [
            'token' => $token, 'email' => $request->email,
        ]);
    }
}
