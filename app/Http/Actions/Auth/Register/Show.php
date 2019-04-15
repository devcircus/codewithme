<?php

namespace App\Http\Actions\Auth\Register;

use Inertia\Inertia;
use Illuminate\Support\Facades\URL;
use PerfectOblivion\Actions\Action;
use Illuminate\Support\Facades\Session;

class Show extends Action
{
    /**
     * Execute the action.
     */
    public function __invoke()
    {
        return Inertia::render('Auth/Register', [
            'intendedUrl' => Session::pull('url.intended', URL::route('dashboard')),
        ]);
    }
}
