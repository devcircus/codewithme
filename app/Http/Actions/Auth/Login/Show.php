<?php

namespace App\Http\Actions\Auth\Login;

use Inertia\Inertia;
use Illuminate\Support\Facades\URL;
use PerfectOblivion\Actions\Action;
use Illuminate\Support\Facades\Session;

class Show extends Action
{
    /**
     * Execute the action.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return Inertia::render('Auth/Login', [
            'intendedUrl' => Session::pull('url.intended', URL::route('dashboard')),
        ]);
    }
}
