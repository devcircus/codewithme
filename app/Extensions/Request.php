<?php

namespace App\Extensions;

class Request
{
    /**
     * Request macro to check if current request is an api request.
     *
     * @return bool
     */
    public function isApi()
    {
        return function () {
            return 'api' === explode('/', $this->path())[0];
        };
    }

    /**
     * Request macro to check if current path is active.
     *
     * @return bool
     */
    public function isActive()
    {
        return function (string $segment) {
            return $segment === explode('/', $this->path())[0];
        };
    }

    /**
     * Request macro to pull the login credentials from the request.
     *
     * @return array
     */
    public function credentials()
    {
        return function () {
            return request()->only(['email', 'password']);
        };
    }
}
