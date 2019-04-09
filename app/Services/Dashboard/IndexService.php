<?php

namespace App\Services\Dashboard;

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
        $users = [
            [
                'name' => 'Clay',
                'age' => 42,
            ],
            [
                'name' => 'John',
                'age' => 36,
            ],
        ];

        return $this->payload
                   ->setOutput($users)
                   ->setStatus($this->payload::STATUS_OK);
    }
}
