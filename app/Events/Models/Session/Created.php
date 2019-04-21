<?php

namespace App\Events\Models\Session;

use App\Models\Session;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class Created
{
    use Dispatchable, SerializesModels;

    /** @var \App\Models\Session */
    public $model;

    /**
     * Create a new event instance.
     */
    public function __construct(Session $model)
    {
        $this->model = $model;
    }
}
