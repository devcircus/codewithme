<?php

namespace App\Listeners\Models;

use App\Events\Models\Session\Created;

class AssignLanguageColor
{
    /**
     * Assign the color code for the language.
     *
     * @param  \App\Events\Models\Session\Created  $event
     */
    public function handle(Created $event)
    {
        return $event->model->setLanguageColor();
    }
}
