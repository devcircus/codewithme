<?php

namespace App\Http\Responders\Dashboard;

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
        return response()->viewWithPayload('dashboard', $this->payload, 'users');
        // return response()->jsonWithPayload($this->payload);
    }
}
