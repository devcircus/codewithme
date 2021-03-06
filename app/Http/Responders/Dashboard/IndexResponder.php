<?php

namespace App\Http\Responders\Dashboard;

use Inertia\Inertia;
use PerfectOblivion\Responder\Responder;

class IndexResponder extends Responder
{
    /**
     * Send a response.
     *
     * @return \Illuminate\View\View
     */
    public function respond()
    {
        return Inertia::render('Dashboard/Index', $this->payload->getWrappedOutput());
        // return response()->viewWithPayload('dashboard', $this->payload, 'users');
        // return response()->jsonWithPayload($this->payload);
    }
}
