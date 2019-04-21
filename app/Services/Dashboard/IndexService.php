<?php

namespace App\Services\Dashboard;

use Illuminate\Support\Facades\Auth;
use PerfectOblivion\Payload\Payload;
use PerfectOblivion\Services\Traits\SelfCallingService;

class IndexService
{
    use SelfCallingService;

    /** @var \PerfectOblivion\Payload\Payload */
    private $payload;

    /**
     * Construct a new IndexService.
     *
     * @param  \PerfectOblivion\Payload\Payload  $payload
     */
    public function __construct(Payload $payload)
    {
        $this->payload = $payload;
    }

    /**
     * Handle the call to the service.
     *
     * @return array
     */
    public function run()
    {
        return $this->payload
            ->setOutput([
                'created' => Auth::user()->createdSessions()->upcoming()->paginate(4, ['*'], 'created'),
                'joined' => Auth::user()->pairedSessions()->upcoming()->paginate(4, ['*'], 'joined'),
        ], 'sessions')
            ->setStatus($this->payload::STATUS_OK);
    }
}
