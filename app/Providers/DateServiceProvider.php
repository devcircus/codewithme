<?php

namespace App\Providers;

use OpenPsa\Ranger\Ranger;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\ServiceProvider;

class DateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->registerCarbonMacros();
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        Date::use(CarbonImmutable::class);
    }

    public function registerCarbonMacros()
    {
        CarbonImmutable::macro('range', function ($to) {
            return (new Ranger('en'))->format(
                $this->toDateString(),
                $to->toDateString()
            );
        });
    }
}
