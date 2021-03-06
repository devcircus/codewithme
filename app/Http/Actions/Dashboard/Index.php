<?php

namespace App\Http\Actions\Dashboard;

use Illuminate\Http\Request;
use PerfectOblivion\Actions\Action;
use App\Services\Dashboard\IndexService;
use App\Http\Responders\Dashboard\IndexResponder;

class Index extends Action
{
    /** @var \App\Http\Responders\Dashboard\IndexResponder */
    private $responder;

    /**
     * Construct a new Dashboard Index action.
     *
     * @param  \App\Http\Responders\Dashboard\IndexResponder  $responder
     */
    public function __construct(IndexResponder $responder)
    {
        $this->responder = $responder;
    }

    /**
     * Execute the action.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        return $this->responder->withPayload(IndexService::call());
    }
}
